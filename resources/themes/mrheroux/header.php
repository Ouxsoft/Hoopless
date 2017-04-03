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
		<header>
			<nav class="navbar fixed-top navbar navbar-inverse bg-inverse bg-faded">
		<form method="get" name="top" action="<?php echo $instance->href('search.html');?>" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
				 <div class="col-9 col-md-6 col-lg-9">
						<a id="logo" href="<?php echo $instance->href('home.html');?>" title="Home"><span class="hidden-sm-down">Matt</span><em>Heroux</em></a>
					</div>
					<div class="col-3 hidden-md-up text-right">
						<button class="btn btn-primary hidden-md-up" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						 <span class="navbar-toggler-icon"></span>
						 </button>
				 </div>
					<div class="col-sm-12 col-md-6 col-lg-3">
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
	</header>
	<div id="window-top">
		<div class="container pt-5 pb-2 mb-2">
			<h1><?php echo $instance->page['current']['page_heading'];?></h1>
			<?php if($instance->page['depth']>1): ?>
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<?php
					$count = 1;
					foreach($instance->page['breadcrumbs'] as $key => $value){
						if ($count==$instance->page['depth']) {
							echo '<li><a class="breadcrumb-item active" href="'.$instance->href($value['alias']).'">'.$value['title'].'</a></li>';
						} else {
							echo '<li><a class="breadcrumb-item" href="'.$instance->href($value['alias']).'">'.$value['title'].'</a></li>';
						}
						$count++;
					}
					?>
				</ol>
			<?php endif; ?>
		</div>
	</div>
</div>

	<div class="container">

			<div class="row">
				<!-- page column -->
				<div class="col-sm-12 col-md-8 col-lg-9 bg-4">
