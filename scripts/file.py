#!/usr/bin/python
import os
import ConfigParser
import time
import MySQLdb.cursors
import pprint
import shutil
import argparse
import sh

__author__ = "Matt Heroux"

'''
TODO: 
when saving it is likely only one node_id will need to be change not all
add git commit for single page
'''

# detect root directory
root_dir = os.path.abspath(os.path.join(__file__ ,'../..'))

# load config
config = ConfigParser.ConfigParser()
config.read(root_dir + "/resources/config/default.conf")
CFG = {}
for section in config.sections():
	CFG[section] = {}
	for (key, value) in config.items('DIR'):
		CFG[section][key] = root_dir + value

# allow for git within python
git = sh.git.bake(_cwd=root_dir)

def file_set_aliases():
	tmp_folder = 'aliases/'
	# remake temporary file directory
	if os.path.exists(CFG['DIR']['tmp']+tmp_folder):
		shutil.rmtree(CFG['DIR']['tmp']+tmp_folder)
	os.makedirs(CFG['DIR']['tmp']+tmp_folder)

	# get list of nodes and aliases
	db = MySQLdb.connect(
		config.get('DATABASE', 'host'),
		config.get('DATABASE', 'user'),
		config.get('DATABASE', 'password'),
		config.get('DATABASE', 'dbname'),
		cursorclass = MySQLdb.cursors.DictCursor)
	cursor = db.cursor()
	cursor.execute("SELECT `node_id`,`alias` FROM `node_alias`")
	db.close()

	# generate a symlink for each aliases
	for row in cursor.fetchall():
		row['alias'] = row['alias'].replace('/','>')
		if not os.path.islink(CFG['DIR']['tmp']+tmp_folder+row['alias']):
			# replace "/" with ">" to allow for flat symlink
			os.symlink(CFG['DIR']['nodes']+str(row['node_id']), CFG['DIR']['tmp']+tmp_folder+row['alias'])

	# replace current alias directory with temp
	shutil.rmtree(CFG['DIR']['aliases'])
	shutil.move(CFG['DIR']['tmp']+tmp_folder, CFG['DIR']['aliases'])
	return True

'''
def file_revisions(file):
	file_dir = root_dir + '/' + file
	return git.blame(file_dir)
	
def file_log(file):
	file_dir = root_dir + '/' + file
	return git.log('-p','--',file_dir)
	
def file_diff(file, a, b):
	file_dir = root_dir + '/' + file
	return git.diff(a,b,'--',file)
'''
def file_save(file,message,email,name):
	file_dir = root_dir + '/' + file
	# if changed than add and commit
	status =  str(git.status("--short", file_dir)).strip()
	if status != '':
		# change users (if different)
		if email != None:
			current_email = str(git.config('--global','user.email')).strip()
			if current_email != email:
				git.config('--global','user.email',email)
		if name != None:
			current_name = str(git.config('--global','user.name')).strip()
			if current_name != name:
				git.config('--global','user.name',name)
		
		# add and commit changes
		git.add(file_dir)
		git.commit(m=message)

		# switch users back
		if email != None and current_email != email:
			git.config('--global','user.email',current_email)
		if name != None and current_name != name:
			git.config('--global','user.name',current_name)
		return True
	else:
		return False
	
	# --show-number
	
if __name__ == "__main__":
	parser = argparse.ArgumentParser(description='Saves changes to node.')
	parser.add_argument('-f','--file', type=str, required=True, help="the file path, e.g. node/1/view.mustache")
	parser.add_argument('-e','--email', type=str, default=None, help="email address of user")
	parser.add_argument('-n','--name', type=str, default=None, help="user's name")
	parser.add_argument('-m','--message', type=str, default='auto save', help="the commit message")
	# add push option
	args = parser.parse_args()

	# commit changes
	'''
	if file_save(args.file, args.message, args.email,args.name) == True:
		print 'Committed changes'
	else:
		print 'No changes'
	'''
	# git push as toggle
	
	# print file_log(args.file)
	
	# update alaises
	if file_set_aliases() == True:
		print 'Aliases updated'
	else:
		print 'Aliases failed to update'
	