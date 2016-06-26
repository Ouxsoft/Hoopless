<?php
function portfolio_href($type, $string){
	// get href for portfolio resources or href provided
	if(substr($string, 0, 4) === "http"){
		return($string);
	} else {
		return SERVER."/resources/portfolio/{$type}/{$string}";
	}
}

function portfolio_print($title, $description, $category){
	// prints box for each category
	global $db;
	echo "<div class=\"container\">";
	echo "<h1>{$title}</h1>";
	echo "<p>{$description}</p>";
	echo "</div>";
	echo "<div id=\"{$category}-carousel\">";
	echo "<a id=\"{$category}-previous\" class=\"carousel-control left\" href=\"#{$category}-carousel\" data-slide=\"prev\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a><a id=\"{$category}-next\" class=\"carousel-control right\" href=\"#{$category}-carousel\" data-slide=\"next\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a>";
	echo "<div id=\"scrolling-{$category}\" class=\"container scrolling\">";
	echo "<ul>";
	$results = $db->query("SELECT CONCAT(IF(`title` IS NULL, 'N/A', CONCAT('<b>',`title`,'</b>')), IF(`media` IS NULL, '', CONCAT(' - ',`media`)),' ',`year`) AS `title`, `href`,`thumbnail` FROM `portfolio` WHERE `category` = '{$category}'");
	foreach ($results as $row){
		echo "<li><div class=\"thumbnail\"><a href=\"".portfolio_href("img", $row["href"])."\" alt=\"{$row["title"]}\" data-toggle=\"lightbox\" data-gallery=\"multiimages\" data-title=\"{$row["title"]}\"><img src=\"".portfolio_href("thumbnail", $row["thumbnail"])."\" style=\"height: 100%;\"/></a></div></li>";
	}
	echo "</ul>";
	echo "</div>";
	echo "</div>";
}

// includes & style customizations
echo "<script src=\"{$instance->href("js/lightbox.js")}\"></script>";
echo "<script>$(document).delegate('*[data-toggle=\"lightbox\"]', 'click', function(event) { event.preventDefault(); $(this).ekkoLightbox();}); </script>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$instance->href("css/lightbox.css")}\"/>";
echo "<script src=\"{$instance->href("js/itemslide.min.js")}\"></script>";
echo "<link rel=\"stylesheet\" property=\"stylesheet\" href=\"{$instance->href("css/home.css")}\" type=\"text/css\"/>";
echo "<style><!-- ";
echo "#web-carousel, #art-carousel, #robot-carousel, #game-carousel {position: relative;} ";
echo ".carousel-control {z-index: 2;} ";
echo ".scrolling {overflow-x: hidden;}  ";
echo ".scrolling ul {-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; margin: 0; padding: 5px; list-style-type: none; -webkit-transform-style: preserve-3d; -ms-transform-style: preserve-3d; transform-style: preserve-3d;}  ";
echo ".scrolling li {float: left; width: 250px; cursor: pointer; -webkit-transform: scale(0.80); -ms-transform: scale(0.80); -moz-transform: scale(0.80); transform: scale(0.80);}  ";
echo ".scrolling .itemslide-active{-webkit-transform: scale(1); -ms-transform: scale(1); -moz-transform: scale(1); transform: scale(1);} ";
echo " --></style>";
// script to process sliders
echo "<script> ";
echo "var web_carousel; ";
echo "var art_carousel; ";
echo "var robot_carousel; ";
echo "var game_carousel; ";
echo "\$(document).ready(function () { ";
echo "web_carousel = \$(\"#scrolling-web ul\"); ";
echo "web_carousel.itemslide({swipe_out: false, start: 3}); ";
echo "\$(window).resize(function () {web_carousel.reload();}); ";
echo "\$(\"#web-next\").click(function() {web_carousel.next(); event.preventDefault();}); ";
echo "\$(\"#web-previous\").click(function() {web_carousel.previous(); event.preventDefault();}); ";
echo "}); ";
echo "\$(document).ready(function () { ";
echo "art_carousel = \$(\"#scrolling-art ul\"); ";
echo "art_carousel.itemslide({swipe_out: false, start: 3}); ";
echo "\$(window).resize(function () {art_carousel.reload();}); ";
echo "\$(\"#art-next\").click(function() {art_carousel.next(); event.preventDefault();}); ";
echo "\$(\"#art-previous\").click(function() {art_carousel.previous(); event.preventDefault();}); ";
echo "}); ";
echo "\$(document).ready(function () { ";
echo "robot_carousel = \$(\"#scrolling-robot ul\"); ";
echo "robot_carousel.itemslide({swipe_out: false, start: 3}); ";
echo "\$(window).resize(function () {robot_carousel.reload();}); ";
echo "\$(\"#robot-next\").click(function() {robot_carousel.next(); event.preventDefault();}); ";
echo "\$(\"#robot-previous\").click(function() {robot_carousel.previous(); event.preventDefault();}); ";
echo "}); ";
echo "\$(document).ready(function () { ";
echo "game_carousel = \$(\"#scrolling-game ul\"); ";
echo "game_carousel.itemslide({swipe_out: false, start: 3}); ";
echo "\$(window).resize(function () {game_carousel.reload();}); ";
echo "\$(\"#game-next\").click(function() {game_carousel.next(); event.preventDefault();}); ";
echo "\$(\"#game-previous\").click(function() {game_carousel.previous(); event.preventDefault();}); ";
echo "}); ";
echo "</script>";

// instructions
echo "<div class=\"container instructions\"><strong>Instructions</strong>: Scroll through and click the thumbnail to view the project. If you are interested in discussing a project, feel free to <a href=\"{$instance->href("contact.html")}\">contact me.</a></div>";

echo "<div class=\"bg-true\">";

// web
portfolio_print("Web Design and Development", "Presented below are some of the websites and web systems I have designed and developed using primarily Apache, PHP, MySQL, HTML, JavaScript, and CSS. I have been developing web pages for over ".(date("Y")-2000)." years (some earlier work is provided to demonstrate growth). Recently, I have been leading a team in the development of a system designed to protect the health and safety of employees and the environment called the <a href=\"https://jnhes.com/demo/home.html\" target=\"_blank\">EHS Compliance Center&trade;</a> (I have personally contributed over 30,000 <abbr title=\"source lines of code\">SLOC</abbr> to this project). Unfortunately, I am not able to share the source code for many of these projects and some of the information has been censored due to active contractual agreements. If you want to check out my coding for this site, go to my <a href=\"https://github.com/mrheroux/hxcms\">github</a> account.", "web");

// art
portfolio_print("Art Design", "Presented below are various art works I have made using Zbrush, Photoshop, Illustrator, Sketchup, acrylics, watercolors, pen/ink, and even <em>mspaint</em>. I admire the works of Alex Grey (who I've enjoyed watching paint at CoSM) and Kentaro Miura.", "art");

// robot
portfolio_print("Robotics Development", "Presented below are discussions and images of systems I have designed for robots. Fun fact: did you know my grandfather invented the first successful industrial robot?", "robot");

// game
portfolio_print("Game Design","Presented below are images of game engines, level editors, and game resources I have developed. I have coded game engines using Javascript, Ruby, Lua, Visual Basic 6.0, VB.Net, DarkBasic, C, C++, Actionscript, et al. Currently, I am programming a web based game engine using <a href=\"http://threejs.org/\" target=\"_blank\">three.js</a> in my spare time.","game");

echo "</div>";
?>
