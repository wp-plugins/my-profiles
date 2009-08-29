<?
$id = $_POST['element_id'];
$value = $_POST['update_value'];
if (update_option($id,$value))
{
	echo $value;
}
else
{
	echo "Save Failed";
}
?>