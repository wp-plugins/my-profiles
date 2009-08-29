<?php
global $myprofiles;
global $myprofiles_path; 
$profileslist="";
$count = sizeof($myprofiles);
$inc;
?>
	<h2 align="center">My profiles Admin panel</h2>
<p>Please fill in the required details for the profiles for each service.<br />
<font color="red">Currently Orkut, Jyte, Blogger and Indiblogger doesn't support nicknames so you have to enter their profile id's here.</font>
<br />
<a href="http://anantshri.info/index.php?page=wpprofiles">for more details you can check here</a>
</p>


<form action="options.php" method="post">
<?php wp_nonce_field('update-options'); ?>
<table class="form-table" style="align:center;" width="100%">
<tr>
<td>Name of service</td><td>User ids</td>
<td>Name of service</td><td>User ids</td>
<td>Name of service</td><td>User ids</td>
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
if ($count % 3 != 0)
{
?>
</tr>
<tr>
<?php
}
?>
<td>&nbsp;</td><td>&nbsp;</td>
<td>Submit the form</td><td><input type="submit" value="<?php _e('Save Changes') ?>" /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="<?php echo $profilelist;?>" />
</form>