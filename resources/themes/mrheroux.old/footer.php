<?php
global $db;
include('lib/build_tree.function.php');

// function that prints menu
function print_menu($array, $level) {
	global $instance;
	foreach($array as $value) {
		echo '<li';
		if($value['alias']==$instance->page['current']['alias']){
			echo ' class="active"';
		}
		echo '>';
		if(is_array($value['children'])){
			echo '<a href="#" data-toggle="collapse" data-target="#toggleDemo'.$value['id'].'" data-parent="#left-nav1">';
			echo $value['title'].' <span class="glyphicon glyphicon-menu-down"></span>';
			echo '</a>';
			echo '<div class="collapse" id="toggleDemo'.$value['id'].'" style="height: 0px;">';
			echo '<ul class="nav nav-list">';
			print_menu($value['children'], $level+1);
			echo '</ul>';
			echo '</div>';
		} else {
			echo '<a href="'.$instance->href($value['alias']).'"'.(isset($value['class'])?' class="'.$value['class'].'"':'').'>';
			if($level>0){
				echo '<span class="glyphicon glyphicon-file"></span> ';
			}
			echo $value['title'];
			echo '</a>';
		}
		echo '</li>';
	}
}
?>

				</div>
				<!-- left menu column-->
				<div class="col-sm-12 col-md-3 col-lg-3">
					<div class="capsule"><h3>Menu</h3><span class="capsule-div"></span></div>
					<div class="col-sm-12 bg-2 hidden-sm-down">
						<div class="navbar navbar-left" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse sidebar-navbar-collapse">
								<ul class="nav navbar-nav" id="left-nav1">
									<?php
									$results = $db->query('
										SELECT `menu_item`.`node_id` AS `id`,`menu_item`.`parent_id`,IF(`menu_item`.`title` IS NULL,`node`.`title`, `menu_item`.`title`) AS `title`, `node_alias`.`alias`
										FROM `menu`
										LEFT JOIN `menu_item` ON `menu`.`menu_id` = `menu_item`.`menu_id`
										LEFT JOIN `node` ON `menu_item`.`node_id` = `node`.`node_id`
										LEFT JOIN `node_alias` ON `menu_item`.`node_id` = `node_alias`.`node_id`
										WHERE `menu`.`title` = \'top-menu\'
										ORDER BY `menu_item`.`item_id` ASC
									');
									print_menu(build_tree($results),0);
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		// breadcrumbs
		$max = count($instance->page['breadcrumbs']);
		if($max>1):
		?>

		<!-- breadcrumb -->
		<div class="breadcrumb">
			<div class="container">
				<?php
				$count = 0;
				foreach($instance->page['breadcrumbs'] as $key => $value){
					if($count==0){
						echo '<a class="crumb-last" href="'.$instance->href($value['alias']).'">';
						echo $value['title']; // '<span class="glyphicon glyphicon-home"></span>
						echo '</a>';
					} else if ($count==$max) {
						echo '<a class="crumb-last" href="'.$instance->href($value['alias']).'">'.$value['title'].'</a>';
					} else {
						echo '<a class="crumb-'.$count.'" href="'.$instance->href($value['alias']).'">'.$value['title'].'</a>';
					}
					$count++;
					if($count<$max){
						echo '<span class="glyphicon glyphicon-menu-right"></span>';
					}
				}
				?>

			</div>
		</div>
		<?php endif; ?>

		<!-- footer -->
		<footer class="footer">
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 text-left">
							<span class="glyphicon glyphicon-copyright-mark"></span> <?php echo date('Y').' '.$instance->website["title"];?> All rights reserved.
						</div>
						<div class="col-xs-4 text-center">
							<a class="block" href="https://validator.w3.org/nu/?doc=<?php echo urlencode($instance->href($instance->page['current']['alias']));?>" target="_blank" rel="nofollow">
								<img src="<?php echo $instance->href('images/common/html5.png');?>" alt="HTML5">
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a class="block" href="#window-top">
								<span class="glyphicon glyphicon glyphicon-chevron-up"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<link rel="stylesheet" href="<?php echo $instance->href('stylesheets/bottom.min.css');?>" type="text/css"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Istok+Web" type="text/css"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" type="text/css"/>

		<script src="<?php echo $instance->href('scripts/jquery.min.js');?>"></script>
		<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
		<script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="<?php echo $instance->href('scripts/lightbox.js');?>"></script>
		<script>$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) { event.preventDefault(); $(this).ekkoLightbox();}); </script>
		<script src="<?php echo $instance->href('scripts/prism.js');?>"></script>
		<script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-87341750-1', 'auto'); ga('send', 'pageview'); </script>
<?php
// Bootstrap core JavaScript placed at the end of the document so the pages load faster
//<script src="{$instance->href('js/bootstrap.min.js')}"></script>
//<script src="{$instance->href('js/ie10-viewport-bug-workaround.js')}"></script>
//<script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
?>
	</body>
</html>
<!-- powered by Hoopless -->
