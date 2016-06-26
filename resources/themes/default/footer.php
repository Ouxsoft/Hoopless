<?php
// footer
echo "<footer class=\"footer\">";

// T&C, Copyright, Top
echo "<div class=\"copyright\">";
echo "<div class=\"container\">";
echo "<div class=\"row\">";
echo "<div class=\"col-xs-3 text-center\">&copy; ".date("Y")." Mr. Heroux</div>";
echo "<div class=\"col-xs-3 text-center\"><a href=\"https://github.com/mrheroux/hxcms\"><img src=\"{$instance->href("img/common/github-white.png")}\" alt=\"Github\"> Github</a></div>";
echo "<div class=\"col-xs-3 text-center\"><a href=\"{$instance->href("resume.html")}\">View Resume</a></div>";
echo "<div class=\"col-xs-3 text-center\"><a href=\"#pagetop\"><span class=\"glyphicon glyphicon glyphicon-chevron-up\"></span></a></div>";
echo "</div>";
echo "</div>";
echo "</div>";

echo "</footer>";

// Bootstrap core JavaScript placed at the end of the document so the pages load faster
echo "<script src=\"https://getbootstrap.com/dist/js/bootstrap.min.js\"></script>";
echo "<script src=\"https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js\"></script>";

echo "</body></html>";
echo "<!-- powered by hxcms -->"
?>