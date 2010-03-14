<?php
load_plugin_textdomain ('my-profiles','wp-content/plugins/my-profiles/i18n');
global $myprofiles;
global $myprofiles_path; 
$profileslist="";
$count = sizeof($myprofiles);
$inc;
?>
<script>
function test1()
{
	scr(document.getElementById("width").value,100);
}
function scr(width,height)
{
	var txt = "<script src='<?php echo bloginfo('url'); ?>/myprofile=js'>";
//	txt = txt + "<script>var width = " + width + "var height" + height;document.getElementById("text_jscript_option").value = txt;
	
}
</script>
<h2 align="center"><?php _e('My profiles Admin panel ', 'my-profiles'); ?></h2>
<p><?php _e('Please fill in the required details for the profiles for each service.', 'my-profiles'); ?><br />
<font color="red"><?php _e('Currently Orkut', 'my-profiles'); ?>, <?php _e('Jyte', 'my-profiles'); ?>, <?php _e('Blogger and Indiblogger doesn', 'my-profiles'); ?>'<?php _e('t support nicknames so you have to enter their profile id', 'my-profiles'); ?>'<?php _e('s here.', 'my-profiles'); ?></font>

<br />
<a href="http://wordpress.org/extend/plugins/my-profiles/"><?php _e('for more details you can check here', 'my-profiles'); ?></a>
</p>
<?php
/*<div>
// this needs to have a facebox popup explaining the way plugin is configured in case used as text widget.
<b>Edit option for widget to display</b><label>Width:</label><input type="text" id="width" maxlength="4" onKeyUp="test1()" />
<br />
<textarea rows="6" cols="130" disabled="disabled" readonly="readonly" id="text_jscript_option">
<script src="<?php echo bloginfo('url'); ?>/myprofile=js"></script>
<script>
	var height = 100;
	var width = 200;
	writeHTMLJS();
</script>	
</textarea>
</div>*/
?>
<form action="options.php" method="post">
<?php wp_nonce_field('update-options'); 
//this is working on table base need to convert to div layout for ajax calls
?>

<input type="checkbox" <?php
 if (get_option('myprofiles_jscript_check'))
 {
   echo "checked"; 
 }   
 ?> name="myprofiles_jscript_check">Check this if you wish to enable the publishing of this widget on otheer webpages</input>
<br />
<table class="form-table" style="align:center;" width="100%">
<tr>
<td><?php _e('Name of service', 'my-profiles'); ?></td><td><?php _e('User ids', 'my-profiles'); ?></td>
<td><?php _e('Name of service', 'my-profiles'); ?></td><td><?php _e('User ids', 'my-profiles'); ?></td>
<td><?php _e('Name of service', 'my-profiles'); ?></td><td><?php _e('User ids', 'my-profiles'); ?></td>
</tr>
<tr>
<?php
$inc=0;
$profilelist=="";
foreach($myprofiles as $site=>$details)
{
	$inc++;
	$nm = $details['name'];
	$uri = $details['url'];
	$img = $details['favicon'];
/*	if ($profilelist=="")
	{
		$profilelist = $nm;
	}
	else
	{
*/
		$profilelist = $profilelist . "," . $nm;
//	}
	?>
	<td><img src="<?php echo $myprofiles_path . $img;?>" alt="<?php echo $site ?>" /> <?php echo $site ?> </td>
	<td><input type="text" name="<?php echo $nm ?>" id="<?php echo $nm ?>" value="<?php echo get_option($nm);?>" /></td>
	<?php
	if ($inc % 3 == 0)
	{
		?>
		</tr>
		<tr>
		<?php
	}
}
// this check is to close the tr in case myprofiles are not in proper sync.
if ($count % 3 != 0)
{
?>
</tr>
<tr>
<?php
}
?>
<td>&nbsp;</td><td>&nbsp;</td>
<td><?php //_e('Submit the form', 'my-profiles'); ?></td><td><input type="submit" value="<?php _e('Save Changes') ?>" /></td>
 <td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="<?php echo $profilelist;?>,myprofiles_jscript_check" />
</form>
