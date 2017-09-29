
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


	parser = argparse.ArgumentParser(description='Saves changes to node.')
	parser.add_argument('-f','--file', type=str, required=True, help="the file path, e.g. node/1/view.mustache")
	parser.add_argument('-e','--email', ty