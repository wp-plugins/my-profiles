<?php
function show_myprofiles()
{
				global $myprofiles_path; 
				global $myprofiles;
//				echo $before_widget;  
	//			echo $before_title;
		//		echo $after_title;
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
			<div id="myprofiles_<?php  echo $count_profile; ?>">
				<a href="<?php echo $url; ?>" title="<?php echo $site ?>" target="_blank">
					<img border="0" src="<?php echo $myprofiles_path . $img;?>" alt="<?php echo $site; ?>" />
				</a>
			</div> 
<?php
			$count_profile = $count_profile + 1;
		}
	}
	$count_profile = 0;
}
?>		 

	<li id="myprofiles_sidebar">
		 <div id="myprofiles_sidebar_head">
			<h2>My Profiles</h2>
		 </div>
	 <div class="clear"></div>
	<div id="myprofiles_sidebar_content">
	 
<?php
show_myprofiles();
?>
	</div>
		<div class="clear"></div>
		<div id="myprofiles_sidebar_footer">
			<a href="http://anantshri.info/index.php?page=wpprofiles">Grab it here</a>
		</div>
		<div class="clear"></div>
	</li>