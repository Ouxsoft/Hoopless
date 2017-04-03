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
        </div> <!-- page end -->
				<div class="col-md-4 col-lg-3">
					<div id="collapseExample">
						<ul class="accordion" id="exCollapsingNavbar3">
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

					<div class="capsule"><h3>Communities</h3><span class="capsule-div"></span></div>

					<ul class="accordion">
					<li><a href="https://github.com/mrheroux" target="_blank">Code Repository</a></li>
					<li><a href="https://www.linkedin.com/in/mrheroux" target="_blank">Stay Connected</a></li>
					<li><a href="http://stackoverflow.com/users/6701768/mrheroux" target="_blank">Contributions</a></li>
				</ul>
    	</div>
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
<script src="<?php echo $instance->href('scripts/jquery.min.js');?>"></script>
<script src="<?php echo $instance->href('scripts/bootstrap.min.js');?>"></script>
<script>
jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});
</script>
<script>
$(window).scroll(function() {
  if ($(document).scrollTop() > 90) {
    $('#logo').addClass('shrink');
  } else {
    $('#logo').removeClass('shrink');
  }
});
</script>


<?php

/*
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Istok+Web" type="text/css"/>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" type="text/css"/>

<script src="
https://cdnjs.cloudflare.com/ajax/libs/angular.js/2.0.0-beta.17/angular2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js"></script>
*/

/* GOOGLE analytics
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-87341750-1', 'auto'); ga('send', 'pageview'); </script>
*/


// Bootstrap core JavaScript placed at the end of the document so the pages load faster
//<script src="{$instance->href('js/bootstrap.min.js')}"></script>
//<script src="{$instance->href('js/ie10-viewport-bug-workaround.js')}"></script>
//<script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
?>
</body>
</html>
<!-- powered by Hoopless -->
