<?php
// instructions
echo '<div class="container instructions">Select a portfolio category.</div>';

echo '<div class="container background-white">';
echo '<div class="list-group">';

echo '<a class="list-group-item" href="'.$instance->href('portfolio/web-design-and-development.html').'"/>Web Design and Development</a>';
echo '<a class="list-group-item" href="'.$instance->href('portfolio/art-design.html').'"/>Art Design</a>';
echo '<a class="list-group-item" href="'.$instance->href('portfolio/robotics-development.html').'"/>Robotics Development</a>';
echo '<a class="list-group-item" href="'.$instance->href('portfolio/game-design.html').'"/>Game Design</a>';

echo '</div>';
echo '</div>';
?>
