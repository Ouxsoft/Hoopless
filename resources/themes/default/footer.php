<?php

/* breadcrumbs */
$max = count($instance->page["breadcrumbs"])-1;
if($max>0){
	echo "<div class=\"breadcrumb\">";
	echo "<div class=\"container\">";
	$count = 0;
	foreach($instance->page["breadcrumbs"] as $key => $value){
		if($count==0){
			echo "<a class=\"crumb-last\" href=\"{$instance->href($value["link"])}\">";
			echo "{$value["name"]}";
			// echo "<span class=\"glyphicon glyphicon-home\"></span>";
			echo "</a>";
		} else if ($count==$max) {
			echo "<a class=\"crumb-last\" href=\"{$instance->href($value["link"])}\">{$value["name"]}</a>";
		} else {
			echo "<a class=\"crumb-{$count}\" href=\"{$instance->href($value["link"])}\">{$value["name"]}</a>";
		}
		if($count<$max){
			echo "<span class=\"glyphicon glyphicon-menu-right\"></span>";
		}
		$count++;
	}
	echo "</div>";
	echo "</div>";
}

// footer
echo "<footer class=\"footer\">";

// T&C, Copyright, Top
echo "<div class=\"copyright\">";
echo "<div class=\"container\">";
echo "<div class=\"row\">";
echo "<div class=\"col-xs-4 text-left\"><a class=\"block\" href=\"{$instance->href("resume.html")}\"><span class=\"glyphicon glyphicon-copyright-mark\"></span> ".date("Y")." Mr. Heroux. All rights reserved.</a></div>";
echo "<div class=\"col-xs-4 text-center\"><a class=\"block\" href=\"https://validator.w3.org/nu/?doc=".urlencode($instance->href($instance->page["current"]["link"]))."\" target=\"_blank\" rel=\"nofollow\"><img src=\"{$instance->href("img/common/html5.png")}\" alt=\"HTML5\"></a></div>";
echo "<div class=\"col-xs-4 text-center\"><a class=\"block\" href=\"#pagetop\"><span class=\"glyphicon glyphicon glyphicon-chevron-up\"></span></a></div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</footer>";


// jquery
echo "<script src=\"{$instance->href("js/jquery.min.js")}\"></script>";

// Bootstrap core JavaScript placed at the end of the document so the pages load faster
//echo "<script src=\"{$instance->href("js/bootstrap.min.js")}\"></script>";
//echo "<script src=\"{$instance->href("js/ie10-viewport-bug-workaround.js")}\"></script>";
//echo "<script src=\"https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js\"></script>";

echo "<script src=\"https://getbootstrap.com/dist/js/bootstrap.min.js\"></script>";
echo "<script src=\"https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js\"></script>";

// lightbox
echo "<script src=\"{$instance->href("js/lightbox.js")}\"></script>";
echo "<script>$(document).delegate('*[data-toggle=\"lightbox\"]', 'click', function(event) { event.preventDefault(); $(this).ekkoLightbox();}); </script>";

// prism
echo "<script src=\"{$instance->href("js/prism.js")}\"></script>";

// css
echo "<link rel=\"stylesheet\" href=\"{$instance->href("css/fonts.css")}\" type=\"text/css\"/>";
echo "<link rel=\"stylesheet\" href=\"//fonts.googleapis.com/css?family=Istok+Web\" type=\"text/css\"/>";
echo "<link rel=\"stylesheet\" href=\"//fonts.googleapis.com/css?family=Open+Sans\" type=\"text/css\"/>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$instance->href("css/lightbox.css")}\"/>";

echo "</body></html>";
echo "<!-- powered by hxcms -->"
?>
