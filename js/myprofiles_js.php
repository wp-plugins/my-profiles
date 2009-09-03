var $j = jQuery.noConflict();
$j(document).ready(function () {
   $j(".edit_me").editInPlace({
        url: "<?php echo $_GET['path']; ?>myprofiles_saveop.php",
        show_buttons: true
    });
});