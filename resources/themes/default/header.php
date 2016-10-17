<?php
global $db;
echo "<!DOCTYPE html>";
echo "<html lang=\"en\">";
echo "<head>";
echo "<title>{$instance->page["current"]["name"]}</title>";
echo "<meta name=\"description\" content=\"{$instance->page["current"]["meta_description"]}\"/>";
echo "<meta name=\"keywords\" content=\"{$instance->page["current"]["name"]}; MrHeroux;\"/>";
echo "<meta name=\"author\" content=\"Mr. Heroux\"/>";
//echo "<meta charset=\"utf-8\">";
echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\"/>";
echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">";
echo "<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">";
echo "<meta name=\"mobile-web-app-capable\" content=\"yes\">";
echo "<meta name=\"theme-color\" content=\"#000000\">";
echo "<link rel=\"shortcut icon\" href=\"{$instance->href("img/favicon/favicon.ico")}\" type=\"image/x-icon\">";
echo "<link rel=\"icon\" href=\"{$instance->href("icons/favicon/favicon.ico")}\" type=\"image/x-icon\">";
echo "<link rel=\"stylesheet\" href=\"{$instance->href("css/general.min.css")}\" type=\"text/css\"/>";

echo "</head>";
echo "<body style=\"background-image: url('{$instance->href("img/body-container/".$instance->page["current"]["id"].".jpg")}');\">";
echo "<div class=\"window\" id=\"pagetop\">";
echo "<form method=\"post\" name=\"user\">";
if($instance->page["current"]["link"]!="home.html"){
	echo "<div class=\"container\">";
	echo "<div class=\"brand\">";
	echo "<a href=\"{$instance->href("home.html")}\" title=\"Home\"><em>Matt</em> Heroux</a>";
	echo "</div>";
	echo "</div>";
}

echo "<nav class=\"navbar navbar-default navbar-static-top\">";

echo "<div class=\"container\">";

echo "<div class=\"navbar-header\">";
echo "<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" >"; /*aria-expanded=\"false\" aria-controls=\"navbar\"*/
echo "<span class=\"sr-only\">Toggle navigation</span>";
echo "<span class=\"icon-bar\"></span>";
echo "<span class=\"icon-bar\"></span>";
echo "<span class=\"icon-bar\"></span>";
echo "</button>";
//echo "<div class=\"navbar-brand\"><a href=\"{$instance->href("home.html")}\" title=\"Home\"><span class=\"firstname\">Matt</span><span class=\"lastname\">Heroux</span></a></div>";
echo "</div>";

// build custom menu
$menu = array(
	array("title" => "Portfolio", "link" => "portfolio.html",
		"submenu" => array(
			array("title" => "Web Design & Development", "link" => "portfolio/web-design-and-development.html",),
			array("title" => "Art Design", "link" => "portfolio/art-design.html"),
			array("title" => "Robotic Programming", "link" => "portfolio/robotics-development.html",),
			array("title" => "Game Design", "link" => "portfolio/game-design.html",),
		),
	),
	array("title" => "Snippets", "link" => "snippets.html"),
	array("title" => "Resume", "link" => "resume.html"),
	array("title" => "Contact", "link" => "contact.html", "class" => "outline"),
);
echo "<div id=\"navbar\" class=\"navbar-collapse collapse window\">";
echo "<ul class=\"nav navbar-nav navbar-left\">";
foreach($menu as $key => $value){
	echo "<li".(($value["link"]==$instance->page["current"]["link"])?" class=\"active\"":"").">";
	if(isset($value["submenu"])&&(is_array($value["submenu"]))){
		echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">{$value["title"]} <b class=\"caret\"></b></a>";
		echo "<ul class=\"dropdown-menu multi-level\">";
		foreach($value["submenu"] as $key2 => $value2){
			echo "<li".(($value2["link"]==$instance->page["current"]["link"])?" class=\"active\"":"")."><a ";
			if(!isset($value2["class"])){
				echo " class=\"{$value2["class"]}\"";
			}
			if(isset($value2["target"])){
				echo " target=\"{$value2["target"]}\"";
			}
			echo " href=\"{$instance->href($value2["link"])}\">{$value2["title"]}</a></li>";
		}
		echo "</ul>";
	} else {
		echo "<a ".(!isset($value["class"])?"":" class=\"{$value["class"]}\"");
		echo (!isset($value["target"])?"":" target=\"{$value["target"]}\"");
		echo " href=\"{$instance->href($value["link"])}\">{$value["title"]}</a>";

	}
	echo "</li>";
}
echo "</ul>";
echo "</div><!--/.nav-collapse -->";
echo "</div>";
echo "</nav>";
echo "</form>";
echo "</div>";

?>
