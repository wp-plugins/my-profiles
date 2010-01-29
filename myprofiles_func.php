<?php
function show_myprofiles($atts = 'v')
{
	extract(shortcode_atts(array(
		'align' => 'v'
		), $atts));
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
			echo "<div id='myprofiles_" . $count_profile . "'";
			if ($align=='h')
			{
			echo " style='float:left;width:45;height:45;display:block'";
			}
			echo ">";
			echo "<a href='" . $url . "' title='" .  $site ."' target='_blank'>";
			echo "<img border='0' src='" . $myprofiles_path . $img . "' alt='" . $site . "'/>";
			echo "</a></div>\n\t\t";
			$count_profile = $count_profile + 1;
			}
			echo "\n";
		}
	}
	$count_profile = 0;
}
function myprofiles_js()
{
global $myprofiles_path; 
?>
function writeHTMLasJS(){
document.write("<link rel=\"stylesheet\" type=\"text\/css\" media=\"screen\" href=\"<?php echo $myprofiles_path; ?>myprofiles.css\" \/>");
document.write("<div id=\"myprofiles\" style='width:" + width + "px;height:" + height + "px'>");
document.write("	<div id=\"myprofiles_head\">		");
document.write("		<h2>My Profiles<\/h2>");
document.write("	<\/div>");
document.write("	<div id=\"myprofiles_content\">");
document.write("	");
<?php
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
/*document.write("<div id='myprofiles_<?php echo $count_profile; ?>'<?php if ($align=='h') then echo"style='float:left;width:45;height:45;display:block'"; ?>> <a href='<?php json_encode($url); ?>' title='<?php echo $site; ?>' target='_blank'><img border='0' src='<?php json_encode($myprofiles_path . $img); ?>' alt='<?php echo $site; ?>'\/><\/a><\/div> ");*/
?>
document.write("<div id='myprofiles_<?php echo $count_profile; ?>' > <a href='<?php echo $url; ?>' title='<?php echo $title; ?>' target='_blank'><img border='0' src='<?php echo $myprofiles_path . $img ?>' alt='<?php echo $site; ?>'\/><\/a><\/div> ");
<?php
			$count_profile = $count_profile + 1;
			}
			echo "\n";
		}
	}
	$count_profile = 0;
?>
document.write("");
document.write("	<div id=\"myprofiles_footer\">");
document.write("		<a href=\"http://wordpress.org/extend/plugins/my-profiles/\">Grab it here<\/a>");
document.write("	<\/div>");
document.write("<\/div>");
}
<?php
}
?>