<?php
echo "<div class=\"cover\">";
echo "<div class=\"container\">";
echo "<div class=\"jumbotron\">";
echo "<div class=\"row\">";
echo "<div class=\"col-md-6 ss-transparent\">";
echo "<h1>Mr. Heroux</h1>";
echo "<h2>Web Designer & Developer</h2>";
echo "<p>I am a creative web developer from New England. I enjoy building and maintaining systems to solve problems from small business sites to enterprise level solutions. My work has been used to manage hazardous waste, entertain kids, manufacturer home decor, and protect employees and the environment. If you are a business seeking a web presence or an employer looking to hire, you can get in touch with me <a href=\"{$instance->href("contact.html")}\">here</a>.</p>";
echo "<button type=\"button\" class=\"btn btn-primary btn-lg\" onclick=\"window.location.href='{$instance->href("contact.html")}'\">I need a website <span class=\"glyphicon glyphicon-menu-right\"></span></button>";
echo "<button type=\"button\" class=\"btn btn-secondary btn-lg\" onclick=\"window.location.href='{$instance->href("contact.html")}'\">I'm looking to hire <span class=\"glyphicon glyphicon-menu-right\"></span></button>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
