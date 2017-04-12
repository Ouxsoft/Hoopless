<?php
global $db;
include('lib/build_tree.function.php');

// function that prints menu
function print_menu($array, $level) {
	global $instance;
	foreach($array as $value) {
		echo '<li class="';
		if($value['alias']==$instance->page['current']['alias']){
			echo ' active';
		}
		echo '">';
		if(is_array($value['children'])){
			echo '<a href="#" data-toggle="collapse" data-target="#toggleDemo'.$value['id'].'" data-parent="#left-nav1">';
			echo $value['title'].' <span class="glyphicon glyphicon-menu-down"></span>';
			echo '</a>';
			echo '<ul class="collapse" id="toggleDemo'.$value['id'].'">';
			print_menu($value['children'], $level+1);
			echo '</ul>';
		} else {
			echo '<a href="'.$instance->href($value['alias']).'"'.(isset($value['class'])?' class="'.$value['class'].'"':'').'>';
			//if($level>0){
			//	echo '<span class="glyphicon glyphicon-file"></span> ';
			//}
			echo $value['title'];
			echo '</a>';
		}
		echo '</li>';
	}
}
?>
				<div class="mt-1">
					<a href="https://plus.google.com/share?url=<?php echo $instance->href($instance->page['current']['alias']);?>&amp;related=mrheroux.com" class="google-share-button"></a>
					<a href="https://twitter.com/intent/tweet?text=<?php echo $instance->href($instance->page['current']['alias']);?>&amp;related=mrheroux.com" class="twitter-share-button"></a>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $instance->href($instance->page['current']['alias']);?>" class="facebook-share-button"></a>
					<small style="float:right">
						<a href="mailto:?"><span class="glyphicon glyphicon-envelope"></span> Email</a> |
						<a href="javascript:window.print()"><span class="glyphicon glyphicon-print"></span> Print</a>
					</small>
				</div>
    	</div>
			<!-- page end -->
			<div class="col-md-4 col-lg-3">
				<div id="collapseExample">
					<ul class="accordion" id="exCollapsingNavbar3"><?php
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
					?></ul>
				</div>

				<div class="capsule"><h3>Communities</h3><span class="capsule-div"></span></div>

				<ul class="accordion">
					<li><a href="https://github.com/mrheroux" target="_blank">Code Repository</a></li>
					<li><a href="https://www.linkedin.com/in/mrheroux" target="_blank">Stay Connected</a></li>
					<li><a href="http://stackoverflow.com/users/6701768/mrheroux" target="_blank">Contributions</a></li>
				</ul>
    	</div>
		</div>
	</div>

	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	<!-- footer -->
	<footer class="footer mt-3 pt-2 pb-2">
		<div class="text-center">
			<a class="block" title="Validate HTML5" href="https://validator.w3.org/nu/?doc=<?php echo urlencode($instance->href($instance->page['current']['alias']));?>" target="_blank" rel="nofollow"><span class="glyphicon glyphicon-copyright-mark"></span> <?php echo date('Y').' '.$instance->website["title"];?> All rights reserved.</a>
		</div>
	</footer>

	<link rel="stylesheet" href="<?php echo $instance->href('stylesheets/bottom.min.css');?>" type="text/css"/>

	<!-- js includes placed here for faster load page times -->
	<script src="<?php echo $instance->href('scripts/script.min.js');?>"></script>
	<!-- individual includes consider uglifing -->
	<script src="<?php echo $instance->href('scripts/custom/cd-top.js');?>"></script>
	<script src="<?php echo $instance->href('scripts/custom/google-analytics.js');?>"></script>
	<script src="<?php echo $instance->href('scripts/custom/lightbox.min.js');?>"></script>
	<script src="<?php echo $instance->href('scripts/custom/logo-shrink.js');?>"></script>
	<script src="<?php echo $instance->href('scripts/custom/prism.js');?>"></script>

	</body>
</html>
<!-- powered by Hoopless -->
<?php
/*
considering using angularjs
https://cdnjs.cloudflare.com/ajax/libs/angular.js/2.0.0-beta.17/angular2.min.js
https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js
*/
?>
