<?php
global $db;

echo "<!DOCTYPE html><html><head>";
// meta
echo "<title>{$instance->page["current"]["name"]}</title><meta name=\"description\" content=\"{$instance->page["current"]["page_description"]}\"/><meta name=\"keywords\" content=\"{$instance->page["current"]["name"]}; MrHeroux;\"/><meta name=\"author\" content=\"Mr. Heroux\"/>";
// app stuff
echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\"/><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\"><meta name=\"apple-mobile-web-app-capable\" content=\"yes\"><meta name=\"mobile-web-app-capable\" content=\"yes\"><meta name=\"theme-color\" content=\"#000000\"><link rel=\"shortcut icon\" href=\"{$instance->href("img/favicon/favicon.ico")}\" type=\"image/x-icon\"><link rel=\"icon\" href=\"{$instance->href("icons/favicon/favicon.ico")}\" type=\"image/x-icon\">";
// css 
echo "<link rel=\"stylesheet\" href=\"{$instance->href("css/general.css")}\" type=\"text/css\"/>";
// jquery
echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>";
echo "</head>";

echo "<body>";
echo "<div class=\"window\" id=\"pagetop\">";
echo "<form method=\"post\" name=\"user\">";
echo "<nav class=\"navbar navbar-inverse navbar-static-top\">";
echo "<div class=\"container\">";
echo "<div class=\"navbar-header\">";
echo "<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" >"; /*aria-expanded=\"false\" aria-controls=\"navbar\"*/
echo "<span class=\"sr-only\">Toggle navigation</span>";
echo "<span class=\"icon-bar\"></span>";
echo "<span class=\"icon-bar\"></span>";
echo "<span class=\"icon-bar\"></span>";
echo "</button>";
echo "<a class=\"navbar-brand\" href=\"{$instance->href("home.html")}\" title=\"Home\"><img src=\"{$instance->href("img/common/logo.png")}\" alt=\"HX\"/></a>";
echo "</div>";

// build custom menu
$menu = array(
	array("title" => "Home", "link" => "home.html"),
	array("title" => "Portfolio", "link" => "portfolio.html"),
	array("title" => "Resume", "link" => "resume.html"),
	array("title" => "Contact", "link" => "contact.html", "class" => "outline"),
);
echo "<div id=\"navbar\" class=\"navbar-collapse collapse window\">";
echo "<ul class=\"nav navbar-nav navbar-right\">";
foreach($menu as $key => $value){
	if(is_array($value["submenu"])){
		// to do
	} else {
		echo "<li".(($value["link"]==$instance->page["current"]["link"])?" class=\"current\"":"")."><a ".(($value["class"]==null)?"":" class=\"{$value["class"]}\"").(($value["target"]==null)?"":" target=\"{$value["target"]}\"")."href=\"{$instance->href($value["link"])}\">{$value["title"]}</a></li>";
	}
}
echo "</ul>";
echo "</div><!--/.nav-collapse -->";
echo "</div>";
echo "</nav>";
echo "</form>";
echo "</div>";

/* breadcrumbs */
echo "<div class=\"breadcrumb\">";
echo "<div class=\"container\">";
$max = count($instance->page["breadcrumbs"])-1;
$count = 0;
foreach($instance->page["breadcrumbs"] as $key => $value){
	if($count==0){
		echo "<a class=\"crumb-first\" href=\"{$instance->href($value["link"])}\">{$instance->department["current"]["abbreviation"]}</a>";
	} else if ($count==$max) {
		echo "<a class=\"crumb-last\" href=\"{$instance->href($value["link"])}\">{$value["name"]}</a>";
	} else {
		echo "<span class=\"separator\">&raquo;</span><a class=\"crumb-{$count}\" href=\"{$instance->href($value["link"])}\">{$value["name"]}</a>";
	}
	
	echo "<span class=\"separator\">&raquo;</span>";
	$count++;
}
echo "</div>";
echo "</div>";
?>