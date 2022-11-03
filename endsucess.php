<?php include("common.php");?>
<?php top(); 
session_start();
echo "<center>";
update_leaderboard();?>
<img src="giphy.webp" class="success">
<?php
echo "<h1>Congratulations you won $ <b> ".$_SESSION["score"]."</b><h1>";
display_leaderboard();
echo "</center>";
sleep(4);
session_destroy();
bottom(); 
?>