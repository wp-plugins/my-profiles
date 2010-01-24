<?php
function widget_myprofiles()
{
?>
	<li id="myprofiles_sidebar">
		 <div id="myprofiles_sidebar_head">
			<h2><?php _e('My Profiles', 'my-profiles'); ?></h2>
		 </div>
	 <div class="clear"></div>
	<div id="myprofiles_sidebar_content">
	 
<?php
show_myprofiles();
?>
	</div>
		<div class="clear"></div>
		<br />
		<div id="myprofiles_sidebar_footer">
		<a href="http://wordpress.org/extend/plugins/my-profiles/"><?php _e('Grab it here', 'my-profiles'); ?></a>
		</div>
		<div class="clear"></div>
	</li>
<?php
}
?>