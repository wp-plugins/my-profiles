<div id="myprofiles_sidebar">
	 <div id="myprofiles_sidebar_head">
		<h2>My Profiles</h2>
	 </div>
	<br />
	 <div class="clear"></div>
	<div id="myprofiles_sidebar_content">
		<?php
			global $myprofiles_path; 
			global $myprofiles;
			echo $before_widget;  
			echo $before_title;
			echo $after_title;
$count_profile = 1;
			foreach($myprofiles as $site=>$details)
			{
				$nm = $details['name'];
				$uri = $details['url'];
				$img = $details['favicon'];
				$url = str_replace("NAME",get_option($nm),$uri);
				if(get_option($nm))
				{
					?>
					<a href="<?php echo $url; ?>" title="<?php echo $site ?>" target="_blank"><div id="myprofiles_<?php  echo $count_profile; ?>"><img border="0" src="<?php echo $myprofiles_path . $img;?>" /></div></a> 

					<?php
$count_profile = $count_profile + 1;
				}
			}
$count_profile = 0;
		?>
	</div>
	<div class="clear"></div>
	<div id="myprofiles_sidebar_footer">
		<a href="http://wordpress.org/extend/plugins/my-profiles/">Grab it here</a>
	</div>
	<div class="clear"></div>
	<br />
</div>

