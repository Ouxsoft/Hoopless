<?php
//nihil sub sole novum

function portfolio_href($type, $string){
	// get href for portfolio resources or href provided
	if(substr($string, 0, 4) === "http"){
		return($string);
	} else {
		return SERVER.'/assets/portfolio/'.$type.'/'.$string;
	}
}
?>

<div class="col-md-12 col-margin bg-1">

	<h2 class="center">Experiences</h2>

	<h3>Careers</h3>
	<hr/>

	<div class="row">
		<div class="col-md-4"><h4>Marlboro College and Graduate School</h4>2016 to Present</div>
		<div class="col-md-8"><h4>Web Developer</h4>
			<p>Working on a team to develop and evolve internal and external college and graduate school web-services for students, faculty, staff, alumni, parents, et al.</p>
			<div class="experience-details">
				<span class="glyphicon glyphicon-map-marker"></span>Marlboro and Brattleboro, Vermont USA | <span class="glyphicon glyphicon-link"></span> <a href="https://www.marlboro.edu" target="_blank">https://www.marlboro.edu</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4"><h4>JNH Environmental Services, Inc.</h4>2012 to 2016</div>
		<div class="col-md-8"><h4>Lead Web Developer</h4>
			<p>Lead a team in the development of systems that protect the health and safety of employees and the environment, such as the <a href="https://jnhes.com/demo/home.html" target="_blank">EHS Compliance Center&trade;</a>.</p>
			<div class="experience-details">
				<span class="glyphicon glyphicon-map-marker"></span>Rutland and Brandon, Vermont USA | <span class="glyphicon glyphicon-link"></span> <a href="https://jnhes.com" target="_blank">https://jnhes.com</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4"><h4>JNH Environmental Services, Inc.</h4>2011 to 2012</div>
		<div class="col-md-8"><h4>Intern - Web Developer</h4>
			<p>As an intern at JNH I worked on the company's web site and learning the company's numerous services.</a></p>
			<div class="experience-details">
				<span class="glyphicon glyphicon-map-marker"></span>Pittsford, Vermont USA | <span class="glyphicon glyphicon-link"></span> <a href="https://jnhes.com" target="_blank">https://jnhes.com</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4"><h4>Questech&reg; Corporation</h4>2006 to 2011</div>
		<div class="col-md-8"><h4>Programmer Operator</h4>
			<p>Designed and developed web based documentation system for robots.<p>
				<div class="experience-details">
					<span class="glyphicon glyphicon-map-marker"></span>Rutland, Vermont | <span class="glyphicon glyphicon-link"></span> <a href="http://questech.com" target="_blank">http://questech.com</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"><h4>Small Startup Studio</h4>2004 to 2006</div>
			<div class="col-md-8"><h4>Web Developer</h4>
				<p>Designed and developed online development platform to enable game developers to collaborate.</p>
				<div class="experience-details">
					<span class="glyphicon glyphicon-map-marker"></span>Online
				</div>
			</div>
		</div>

		<h3>Education</h3>
		<hr/>

		<div class="row">
			<div class="col-md-4"><h4>Castleton University</h4>2012</div>
			<div class="col-md-8"><h4>Bachelor of Science in Computer Information Systems/Business</h4>
				<div class="experience-details">
					<span class="glyphicon glyphicon-map-marker"></span>Castleton, Vermont USA
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"><h4><abbr title="Community College of Vermont">CCV</abbr></h4>2009</div>
			<div class="col-md-8"><h4>Associate of Science Degree, Computer Systems Management</h4>
				<div class="experience-details">
					<span class="glyphicon glyphicon-map-marker"></span>Newport, Vermont USA
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"><h4>Cisco Systems Networking Academy</h4>2005</div>
			<div class="col-md-8"><h4>Fundamentals of Web Design</h4>
				<div class="experience-details">
					<span class="glyphicon glyphicon-map-marker"></span>Lyndon Center, Vermont USA
				</div>
			</div>
		</div>

	</div>

	<div class="col-md-12 col-margin bg-1">
		<h2 class="center">Abilities</h2>
		<h3>Skills</h3>
		<hr/>
		<div class="row">
			<?php
			$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Web skills' ORDER BY `score` DESC, `name`");
			foreach($results as $row) {
				echo '<div class="col-md-6">';
				echo '<ul class="no-bullets">';
				echo '<li>';
				echo '<span class="ability-title">'.$row["title"].'</span>';
				echo '<span class="ability-score">';
				for($i = 1; $i<=5; $i++){
					echo '<span class="glyphicon glyphicon-star'.(($i<=$row['score'])?' filled':'').'"></span>';
				}
				echo '</span>';
				echo '</li>';
				echo '</div>';
			}
			?>
			</div>

			<h3>Tools</h3>
			<hr/>
			<div class="row">
				<?php
				$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Web tools' ORDER BY `score` DESC, `name`");
				foreach($results as $row) {
					echo '<div class="col-md-6">';
					echo '<ul class="no-bullets">';
					echo '<li>';
					echo '<span class="ability-title">'.$row["title"].'</span>';
					echo '<span class="ability-score">';
					for($i = 1; $i<=5; $i++){
						echo '<span class="glyphicon glyphicon-star'.(($i<=$row['score'])?' filled':'').'"></span>';
					}
					echo '</span>';
					echo '</li>';
					echo '</div>';
				}
				?>
				</div>
				<br/>
				<div class="text-center"><p><i>This site is built on a custom made PHP framework.</i></p><button type="button" class="btn btn-primary btn-lg" onclick="window.open('https://github.com/mrheroux/hxcms')">See project on Github <span class="glyphicon glyphicon-menu-right"></span></button></div>

				<h3>Languages</h3>
				<hr/>
				<div class="row">
					<?php
					$results = $db->query("SELECT CONCAT(`name`, IF(`started` <= date_sub(now(), interval 10 year), ' (10+ Years)', IF(`started` < date_sub(now(), interval -10 year), CONCAT(' (',TIMESTAMPDIFF(YEAR,`started`, CURDATE()), ' Years)'), ''))) AS `title`, `score` FROM `abilities` WHERE `category` = 'Languages' ORDER BY `score` DESC, `name`");
					foreach($results as $row) {
						echo '<div class="col-md-6">';
						echo '<ul class="no-bullets">';
						echo '<li>';
						echo '<span class="ability-title">'.$row["title"].'</span>';
						echo '<span class="ability-score">';
						for($i = 1; $i<=5; $i++){
							echo '<span class="glyphicon glyphicon-star'.(($i<=$row['score'])?' filled':'').'"></span>';
						}
						echo '</span>';
						echo '</li>';
						echo '</div>';
					}
					?>
					</div>
				</div>

				<div class="col-md-12 col-margin bg-1">
					<h2 class="center">Awards</h2>

					<div class="row">
						<div class="col-md-4"><h4>SkillsUSA </h4>2005</div>
						<div class="col-md-8"><h4>Computer Programming</h4>
							<p>Programmed a banking system within the allowed time to win 2nd place in SkillsUSA State of Vermont competition for computer programming.</p>
							<div class="experience-details">
								<span class="glyphicon glyphicon-map-marker"></span>Burlington, Vermont
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-4"><h4>American Computer Science League </h4>2003 to 2004</div>
						<div class="col-md-8"><h4>Computer Programming</h4>
							<p>Programmed several applications over the course of the year to win 1st place in American Computer Science League competition.</p>
							<div class="experience-details">
								<span class="glyphicon glyphicon-map-marker"></span>Lyndon, Vermont
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-margin bg-1">
					<h2 class="center">Projects</h2>
					<p>Presented below are some of the websites and web systems I have designed and developed. Some of the information has been censored due to active contractual agreements.</p>

					<div class="row">
					<?php
						$db->bind("category","web");
						$results = $db->query("SELECT CONCAT(IF(`title` IS NULL, 'N/A', CONCAT('<b>',`title`,'</b>')), IF(`media` IS NULL, '', CONCAT(' - ',`media`)),' ',`year`) AS `title`, `href`,`thumbnail` FROM `portfolio` WHERE `category` = :category ORDER BY `year` DESC, `id` ASC");
						foreach ($results as $row){
							echo '<div class="col-xs-3">';
							echo '<div class="thumbnail">';
							echo '<a href="'.portfolio_href("images", $row["href"]).'" alt="'.$row["title"].'" data-toggle="lightbox" data-gallery="multiimages" data-title="'.$row["title"].'">';
							echo '<img src="'.portfolio_href("thumbnails", $row["thumbnail"]).'"/>';
							echo '</a>';
							echo '</div>';
							echo '</div>';
						}
					?>
					</div>
				</div>
