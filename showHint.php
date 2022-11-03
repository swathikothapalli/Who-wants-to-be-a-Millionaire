<?php
session_start();
$_SESSION["showHint"] = True;
//unset ($_SESSION["currentQuestion"]);
header("Location: game.php");    
?>