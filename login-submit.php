<?php include("common.php");?>
<?php top(); ?>

<?php
// Start the session
echo '<div class = "startgame"><center>';
authenticate_login_details();
echo '</center></div>';
bottom(); 
?>