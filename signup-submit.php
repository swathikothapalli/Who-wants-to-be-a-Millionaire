<!--
Read the data as POST from the query parameters and store it in login.txt
-->
<?php include("common.php");?>
<?php top1()?>
<?php
if(!empty($_POST["username"]) && !empty($_POST["password"]) && validateUserAlreadyExists()){
    newWriteToFile(); 
?>
<div class ='errors'>   
    <h1>Thank you!</h1>
    <p>
        Welcome to the Game, <?= $_POST["username"] ?>!<br/><br/>
        Now <a class='link' href="login.php">log in to play the game!</a>
    </p>
</div>
<?php
}
else{
    echo "<br><br><div class='errors'><b>Error! Invalid data.</b>
    <p>We're sorry. You submitted invalid user information. Please go back and try again.</p></div>";
    
}
?>
<?php bottom()  ?>
