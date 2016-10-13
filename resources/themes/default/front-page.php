<?php
echo "<style><!-- .brand {display: none;} --></style>";
echo "<div class=\"cover\">";
echo "<div class=\"container\">";
echo "<div class=\"jumbotron\">";
echo "<div class=\"row\">";
echo "<div class=\"col-md-6 ss-transparent\">";
echo "<h1><img src=\"{$instance->href("img/common/logo-big.png")}\"/><span class=\"normal\"> / <abbr title=\"also known as Mr. Heroux\">Mr. Heroux</abbr></span></h1>";
echo "<h3>Designer & Developer</h3>";
echo "<p>I am a creative PHP web developer. I build and evolve web solutions from small business sites to complex enterprise level software.</p><p>My work has been used to train employees, entertain children, manufacturer home decor, manage and ship hazardous materials, and protect the environment.</p><p>If you are a business seeking a web presence or an employer looking to hire,  <a href=\"{$instance->href("contact.html")}\">get in touch with me</a>.</p>";
echo "<br/><p><button type=\"button\" class=\"btn btn-primary btn-lg\" onclick=\"window.location.href='{$instance->href("contact.html")}'\">I'm looking to hire<span class=\"glyphicon glyphicon-menu-right\"></span></button> <button type=\"button\" class=\"btn btn-default btn-lg\" onclick=\"window.location.href='{$instance->href("contact.html")}'\">I need a website <span class=\"glyphicon glyphicon-menu-right\"></span></button></p>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
