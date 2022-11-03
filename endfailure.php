<?php include("common.php");?>
<?php top(); 
session_start();
echo "<center>";
update_leaderboard();
echo "<h1>Sorry you didnt reach last round. But Better luck next time but you won $ <b> ".$_SESSION["score"]."</b></h1>";
display_leaderboard();
echo "</center>";
sleep(4);
session_destroy();
bottom(); 
?>