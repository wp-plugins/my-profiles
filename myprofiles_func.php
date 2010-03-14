<?php
function show_myprofiles($atts = 'v',$type='html')
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
				if ($type == 'js')
				{
?>
				document.write("<a id='myprofiles_<?php echo $count_profile; ?>' style='background-image: url(<?php echo $myprofiles_path . $img ?>);' href='<?php echo $url; ?>' title='<?php echo $site; ?>' target='_blank'><?php echo $site; ?><\/a>");
<?php
				}
				else
				{
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
			}
			echo "\n";
		}
	}
	$count_profile = 0;
}
function myprofiles_js()
{
global $myprofiles_path; 
//echo $myprofiles_path;
?>
function writeHTMLJS(height,width){
if (width == null)
{
    width=200;
}
if (height == null)
{
    height=100;
}
document.write("<link rel=\"stylesheet\" type=\"text\/css\" media=\"screen\" href=\"<?php echo $myprofiles_path; ?>myprofiles.css\" \/>");
document.write("<div id=\"myprofiles\" style='width:" + width + "px;height:" + height + "px'>");
document.write("	<div id=\"myprofiles_head\">		");
document.write("		<h2>My Profiles<\/h2>");
document.write("	<\/div>");
document.write("	<div id=\"myprofiles_widget_content\">");
document.write("	");
<?php
/*	global $myprofiles_path; 
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
// This one is working code 
/*document.write("<div id='myprofiles_<?php echo $count_profile; ?>' > <a href='<?php echo $url; ?>' title='<?php echo $title; ?>' target='_blank'><img border='0' src='<?php echo $myprofiles_path . $img ?>' alt='<?php echo $site; ?>'\/><\/a><\/div> ");*/
// This works in case img tag has some css already applied to it..
/*document.write("<div id='myprofiles_<?php echo $count_profile; ?>' style='position:relative;background-image: url(<?php echo $myprofiles_path . $img ?>);background-repeat:no-repeat;'> <a href='<?php echo $url; ?>' title='<?php echo $site; ?>' target='_blank'><\/a><\/div> ");*/
// checking to see if we can eliminate the need of DIV tag at all.
/*document.write("<a id='myprofiles_<?php echo $count_profile; ?>' style='background-image: url(<?php echo $myprofiles_path . $img ?>);' href='<?php echo $url; ?>' title='<?php echo $site; ?>' target='_blank'><?php echo $site; ?><\/a>");
*/
?>
<?php
/*			$count_profile = $count_profile + 1;
			}
			echo "\n";
		}
	}
	$count_profile = 0;
*/
show_myprofiles('h','js')
?>
document.write("</div>");
document.write("<br /><span>&nbsp;</span><br />");
document.write("	<div id=\"myprofiles_widget_footer\">");
document.write("		<a href=\"http://wordpress.org/extend/plugins/my-profiles/\" target=\"_blank\">Grab it here<\/a>");
document.write("	<\/div>");
document.write("<\/div>");
}
<?php
}
?>
