<?php
//sounds
$ambient = get_template_directory_uri() . '/includes/sounds/ambient.mp3';
$buttonClick = get_template_directory_uri() . '/includes/sounds/button.mp3';
$buttonHover = get_template_directory_uri() . '/includes/sounds/hover-button.mp3';
$sectionSound = get_template_directory_uri() . '/includes/sounds/whoosh.mp3';
$panel = get_template_directory_uri() . '/includes/sounds/panel.mp3';

//svg's
$requestImage = get_template_directory_uri() . '/includes/assets/headphones.svg';
$dragIcon = get_template_directory_uri() . '/includes/assets/scroll.svg';

?>
<audio loop src=<?php echo $ambient;?> id = 'ambientSound'>
	Your browser does not support the
	<code>audio</code> element.
</audio>
<audio src=<?php echo $buttonClick;?> id = 'buttonClickSound'>
	Your browser does not support the
	<code>audio</code> element.
</audio>
<audio src=<?php echo $buttonHover;?> id = 'hoverButtonSound'>
	Your browser does not support the
	<code>audio</code> element.
</audio>
<audio src=<?php echo $sectionSound;?> id = 'whooshSound'>
	Your browser does not support the
	<code>audio</code> element.
</audio>
<audio src=<?php echo $panel;?> id = 'panelSound'>
	Your browser does not support the
	<code>audio</code> element.
</audio>

<div class = 'page-view homepage'>
	<div class = 'small-menu-container'>
		<canvas id = 'smallMenu'></canvas>
		<div class="menu-word">
		    <div class="word">
		      •
		    </div>
		    <div class="word">
		      M
		    </div>
		    <div class="word">
		      E
		    </div>
		    <div class="word">
		      N
		    </div>
		    <div class="word">
		      U
		    </div>
		    <div class="word">
		      •
		    </div>
	  </div>
	</div>
	<canvas id = 'canvas'></canvas>


	<!-- intro -->
	<div class = 'intro hover-sound click-sound'>
		<h4 id = 'introPlay' class = 'change-state' data-change-to = 'welcome'>Enter</h4>
	</div>

	<!-- panels -->
	<!-- WELCOME -->
	<div class = 'holo-ui welcome-ui' id = 'welcomeChange'>
		<div class = 'wrapper'>
			<!-- lines -->
			<span class = 'top-left-line outside-line top-outside-line'></span>
			<span class = 'bottom-right-line-one outside-line bottom-outside-line'></span>
			<span class = 'bottom-right-line-two outside-line bottom-outside-line'></span>
			<span class = 'edge bezier'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge bezier'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge bezier'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge bezier'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge connector'></span>

			<!-- content -->
			<div class = 'top-title'>
				<h3>WINDOW TITLE</h3>
			</div>
			<div class = 'content-wrapper'>
				<div class = 'paragraph-text'>
					<span class = 'gradient-line'></span>
					<span class = 'gradient-line'></span>
					<span class = 'gradient-line'></span>
					<span class = 'gradient-line'></span>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
				<div class = 'seperator'>
					<span class = 'seperator-line'></span>
				</div>
				<div class = 'projects-section buttons button-quad'>
					<div class = 'button hover-sound click-sound change-state' id = 'projects' data-change-to = 'projects'>
						<a href = '#'>PROJECTS</a>
					</div>
					<div class = 'button hover-sound click-sound change-state' id = 'skills'>
						<a href = '#'>SKILLS</a>
					</div>
					<div class = 'button hover-sound click-sound change-state' id = 'experience'>
						<a href = '#'>EXPERIENCE</a>
					</div>
					<div class = 'button hover-sound click-sound change-state' id = 'contact'>
						<a href = '#'>CONTACT</a>
					</div>
				</div>
			</div>



			

		</div>

	</div>

	<!-- PROJECTS -->
	<div class = 'holo-ui projects-ui' id = 'projectsChange'>
		<div class = 'wrapper'>
			<!-- lines -->
			<span class = 'top-left-line outside-line top-outside-line'></span>
			<span class = 'bottom-right-line-one outside-line bottom-outside-line'></span>
			<span class = 'bottom-right-line-two outside-line bottom-outside-line'></span>
			<span class = 'edge bezier'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge bezier'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge bezier'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge bezier'></span>
			<span class = 'edge connector'></span>
			<span class = 'edge connector'></span>

			<!-- content -->
			<div class = 'top-title'>
				<div class = 'go-back-button change-state hover-sound click-sound' id = 'welcome' data-change-to = 'welcome'>
					<p>BACK</p>
				</div>
				<h3>PROJECTS</h3>
			</div>
			<div class = 'content-wrapper'>
				<div class = 'paragraph-text'>
					<span class = 'gradient-line'></span>
					<span class = 'gradient-line'></span>
					<span class = 'gradient-line'></span>
					<span class = 'gradient-line'></span>
					<p>
						Some of the work I have done, Click to expand for information and to visit the sites.
					</p>
				</div>
				<div class = 'seperator'>
					<span class = 'seperator-line'></span>
				</div>
				<div class = 'show-all-projects'>
					<?php
					 $projects = get_posts(array('posts_per_page' => -1, 'orderby' => 'date', 'order' => 'asc', 'post_type' => 'project'));
					 // start foreach
					 foreach($projects as $project){
					 	$logoID = get_field('logo',$project);
					 	$logo = wp_get_attachment_image_src($logoID,'project-logo')[0];
					 	$backgroundColor = 'background-color:'.get_field('background_color',$project).';';
					 	$technologies = get_field('technologies',$project);
					 	$link = get_field('link',$project);
					 	?>
					 	<div class = 'single-project'>
					 		<div class = 'logo'>
					 			<div class = 'background' style = <?php echo $backgroundColor;?>></div>
					 			<img src = <?php echo $logo;?>>
					 		</div>
					 		<div class = 'more-information'>
					 			<div class = 'single-tech-list'>
					 				<h3>TECHNOLOGIES USED:</h3>
					 				<ul>
					 					<?php 
					 					// FOREACH TECHNOLOGIES
					 					foreach($technologies as $tech){
					 						$techImageID = $tech['tech_icon'];
					 						$techImage = wp_get_attachment_image_src($techImageID,'tech-icon')[0];
					 						?>
					 							<li class = 'tech-icon'>
					 								<img src = <?php echo $techImage;?>>
					 							</li>
					 						<?php
					 					};
					 					?>
					 				</ul>
					 			</div>
					 			<div class = 'button hover-sound click-sound'>
					 				<a href = <?php echo $link;?> target = '_blank'>VISIT</a>
					 			</div>
					 		</div>
					 	</div>
					 	<?php
					 	
					 };
					 // end foreach

					?>

				</div>
			</div>



			

		</div>

	</div>


	<!-- request audio if needed-->
	<div id  ='audioRequest'>
		<img src = <?php echo $requestImage;?>>
		<p>Please enable audio for the site</p>
		<div class = 'button' id = 'sendAudioRequest'>
			<a href = '#'>Enable Audio</a>
		</div>
	</div>

	<div class = 'drag-hint'>
		<img src = <?php echo $dragIcon;?>>
	</div>

</div>

