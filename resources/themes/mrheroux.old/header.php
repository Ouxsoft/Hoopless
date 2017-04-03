<?php
global $db;
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $instance->page['current']['title'];?></title>
		<meta name="description" content="<?php echo $instance->page['current']['meta_description'];?>"/>
		<meta name="keywords" content="<?php echo $instance->page['current']['title'];?>"/>
		<link type="text/plain" rel="author" href="<?php echo SERVER;?>/humans.txt"/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="mobile-web-app-capable" content="yes"/>
		<meta name="theme-color" content="#000"/>
		<link rel="shortcut icon" href="<?php echo $instance->href('images/favicon/favicon.ico');?>" type="image/x-icon"/>
		<link rel="icon" href="<?php echo $instance->href('icons/favicon/favicon.ico');?>" type="image/x-icon"/>
		<link rel="stylesheet" href="<?php echo $instance->href('stylesheets/top.min.css');?>" type="text/css"/>
	</head>
	<body class="bg-body">
		<form id="window-top" method="get" name="top" action="<?php echo $instance->href('search.html');?>" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-9" id="logo">
						<a href="<?php echo $instance->href('home.html');?>" title="Home">Matt<em>Heroux</em></a>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="input-group" id="search">
							<input type="text" class="form-control" name="q" placeholder="Search">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="container">
			<div class="row">
				<!-- page column -->
				<div class="col-sm-12 col-md-9 bg-4">
					<h1><?php echo $instance->page['current']['page_heading'];?></h1>
					<a href="https://plus.google.com/share?url=<?php echo $instance->href($instance->page['current']['alias']);?>&amp;related=mrheroux.com" class="google-share-button"></a>
					<a href="https://twitter.com/intent/tweet?text=<?php echo $instance->href($instance->page['current']['alias']);?>&amp;related=mrheroux.com" class="twitter-share-button"></a>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $instance->href($instance->page['current']['alias']);?>" class="facebook-share-button"></a>
					<small style="float:right">
						<a href="mailto:?"><span class="glyphicon glyphicon-envelope"></span> Email</a> |
						<a href="javascript:window.print()"><span class="glyphicon glyphicon-print"></span> Print</a>
					</small>
