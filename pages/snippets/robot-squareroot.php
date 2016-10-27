<?php
echo "<div class=\"container background-white\">";

// teaching robot square root
echo '<h2>Problem</h2>';
echo '<p>A simple yet interesting library function I programmed for FANUC&reg; RJ32 robots using KAREL was a square root function. In order to calculate some of the variable positions in my new program I needed to use Pythagorean\'s theorem, i.e. a<sup>2</sup> + b<sup>2</sup> = c<sup>2</sup>. To solve for any of the variables in this equation I needed to take the square root of the others. Unfortunately, the robotic controller did not have a square root function.</p>';
echo '<h2>Solution</h2>';
echo '<p>I programmed a square root function using Newton\'s method of successive approximations in KAREL on the FANUC robotic controller because that is where the position coordinates were determined. Basically, the function performs an educated guess and checks whether the guess squared is within a specified range from the original number. If not, then a better guess is performed, i.e. (x/y<sup>2</sup> +2y) / 3 where y is an approximation to the cube root of x. If it is within the range, the value is returned.</p>';

echo '</div>';
?>
