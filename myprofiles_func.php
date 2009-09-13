<?php
function show_myprofiles()
{
	global $myprofiles_path; 
	global $myprofiles;
	$count_profile = 1;
	foreach($myprofiles as $site=>$details)
	{
		$nm = $details['name'];
		$uri = $details['url'];
		$img = $details['favicon'];
		if(get_option($nm))
		{
			$list = explode(";",get_option($nm));
			foreach($list as $list_item)
			{
			$url = str_replace("NAME",$list_item,$uri);
			echo "<div id='myprofiles_" . $count_profile . "'>";
			echo "<a href='" . $url . "' title='" .  $site ."' target='_blank'>";
			echo "<img border='0' src='" . $myprofiles_path . $img . "' alt='" . $site . "'/>";
			echo "</a></div> ";
			$count_profile = $count_profile + 1;
			}
		}
	}
	$count_profile = 0;
}
?>