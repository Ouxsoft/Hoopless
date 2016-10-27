<?php
echo '<div class="container background-white">';

// solving scrap
echo '<h2>Problem</h2>';
echo '<p>Due to uncontrolled variables in the casting process, parts were often casted bent in either a concave shape or convex shape, which was referred to as warped. This caused issues because the parts had raised detail, which needed to be process by the robots in at least 2 directions (e.g. 0&deg; and 90&deg). When the robots would process the concave parts they would not stay in the jig and the part would get shot out by a wheel spinning at up to 4,500 RPM. The projectile would cause a chain reaction that would often result in the destruction of the part, destruction of neighboring parts, destruction of 4\'x4\' glass safety panels, and jeopardized employee safety. When the robot attempted to process convex parts, which were raised in the middle, the middle of the part would end up processed more than the ends and the part would be scrapped for quality control reasons.</p>';
echo '<h2>Solution</h2>';
echo '<p>After careful inspection, I noticed that the concave parts were shooting out of the robots\' <abbr title="a jig is what held the part to the robot\'s arm">jig</abbr> only when the top portion of the part was being processed. Therefore, I figured that if I eliminated the robots need to process the top portion of the part, the part would stay in the jig. Unfortunately, it wasn\'t that simple. If the robot did not process the top portion of the part at all, the part\'s surface would appear uneven and not pass quality control inspection. Luckily, using a little common sense I figured away around this by developing a routine I named the Warp Offset Routine. As illustrated below, the Warp Offset Routine would complete 100% of the processing to the bottom of the warped part, 50% to the middle portion of the part, and skip the top warped portion of the part. It would then spin the parts around 180&deg; and repeat this process. The result was a perfectly even part that was not broken.</p>';

echo '<p><u>OEM Routine</u></p>';
echo '<p><img src="'.SERVER.'/assets/portfolio/images/oem-routine.jpg"/></p>';
echo '<p><u>Warp Offset Routine</u></p>';
echo '<p><img src="'.SERVER.'/assets/portfolio/images/warp-offset-routine.jpg"/></p>';

echo '<p>As illustrated above, the Warp Offset Routine allowed for the parts to be processed evenly without directly processing the top warped portion of the part in a way that would cause it to fall out. I am pleased to report, this program modification eliminated scrap on all concave parts, which decreased manufacturing costs.<p>';
echo '<p>To prevent scrap generated from the processing of convex parts, I integrated a variable speed input into the program to allow for the operator to set the speed at which the x-offset was processed. This allowed for convex parts to be processed evenly despite it being an uneven surface. In addition, I allowed the operator to set the distance of the Warp Offset Routine from the edge of the part. This prevented additional wear on the edge of the part and helped reduced manufacturing costs. Essentially, that is how I eliminated scrap.</p>';

echo '</div>';
?>
