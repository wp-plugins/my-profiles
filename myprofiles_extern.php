<html>
<head>
<title>My-Profiles</title>
</head>
<body>
<?php
// get the prarmeters from query string and then proceed forward.
$height = $_GET['height'];
$width= $_GET['width'];
//echo "<!--Path = " . WP_CONTENT_URL . "$done-->";
$wpload_path = '../../../wp-load.php';
include_once($wpload_path);
include_once('myprofiles.php');
function profiles_view($w = '250', $h = '400')
{
	echo '<link rel="stylesheet" type="text/css" media="screen" href="' . $myprofiles_path . 'myprofiles.css" />'."\n";
?>
<div id="myprofiles" style='width:<?php echo $w; ?>px;height:<?php echo $h; ?>px'>
	<div id="myprofiles_head">		
		<h2><?php _e('My Profiles', 'my-profiles'); ?></h2>
	</div>
	<div id="myprofiles_sidebar_content">
	<?php
	show_myprofiles();
	?>
	</div>
	<div id="myprofiles_sidebar_footer">
		<a href="http://wordpress.org/extend/plugins/my-profiles/"><?php _e('Grab it here', 'my-profiles'); ?></a>
	</div>
</div>
<?php
}
profiles_view($width,$height);
?>
</body>
</html>