<?php 
session_start();
echo "score page";
if($_POST['submit']) {

     $q1 = $_POST['q1'];
    if($q1 =='') {
        echo '<h2>Please answer the question properly.</h2>';
    }
    else{
        if($q1 == $_SESSION["currentQuestion"][7]){
            $_SESSION["score"] = $_SESSION["score"] + $_SESSION["scoreMultiple"]*10 ;
            $_SESSION["scoreMultiple"] = $_SESSION["scoreMultiple"] * 10;
            $_SESSION["questionNumber"] = $_SESSION["questionNumber"] + 1;

            if($_SESSION["questionNumber"] == 7){
                unset ($_SESSION["currentQuestion"]);
                header("Location: endsucess.php");
                exit();
            }
            else{
                unset ($_SESSION["currentQuestion"]);
                header("Location: game.php");
                exit();
            }
        }
        else{
                unset ($_SESSION["currentQuestion"]);
                header("Location: endfailure.php");
                exit();
        }

    }
}
?>