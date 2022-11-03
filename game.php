<?php include("common.php");?>
<?php top(); 
echo '<link rel="stylesheet" href= "css/flipcard.css" type = "text/css">';
?>

<?php 
	session_start();
	echo "<center>";
	echo "<h1>Who wants to be a Millionaire?</h1>";
	echo "<h2>Question: ".$_SESSION["questionNumber"]."/6</h2>";
	$ques = array();

	if (!$_SESSION["showHint"]){
		if($_SESSION["questionNumber"] == 1 ||  $_SESSION["questionNumber"] == 2){

			$ques = array_shift($_SESSION["easyQuestionArray"]);
			
			
		} else if ($_SESSION["questionNumber"] == 3 || $_SESSION["questionNumber"]  == 4) {
			$ques = array_shift($_SESSION["medQuestionArray"]);
		}
		else{
				$ques  = array_shift($_SESSION["highQuestionArray"]);
		}
		$_SESSION["currentQuestion"] = $ques;
	
	}
		
		
		if (!$_SESSION["showHint"]){
			echo '<a id="btns" href="showHint.php" name="btn">Click Here for Hint (You lose half score)</a>';
		}
		else{
			echo "<h3>Hint : </h3>";
			echo '<div class="hint">',$_SESSION["currentQuestion"][8], '</div>';
			$_SESSION["showHint"]=False;
			$_SESSION["score"]=intdiv($_SESSION["score"],2);
		}
	

		echo '<form action="score.php" method="post">';
		echo "<h2>Current Question value : ", $_SESSION["scoreMultiple"]*10, "</h2>";
		echo "<h2>Earned Money: ",$_SESSION["score"],"</h2>";
		echo '<div class="flip-card">
			  <div class="flip-card-inner">
			    <div class="flip-card-front">';
		echo "<div class='question'><h2>",$_SESSION["currentQuestion"][2],"</h2></div>";
			    echo '</div>
			    <div class="flip-card-back">';
						echo "<ol>";
						echo '<li><input checked="checked" type="radio" name="q1" value="', $_SESSION["currentQuestion"][3],'" /><p class="options">',$_SESSION["currentQuestion"][3],'</p></li>';
						echo '<li><input type="radio" name="q1" value="', $_SESSION["currentQuestion"][4],'" /><p class="options">',$_SESSION["currentQuestion"][4],'</p></li>';
						echo '<li><input type="radio" name="q1" value="', $_SESSION["currentQuestion"][5],'" /><p class="options">',$_SESSION["currentQuestion"][5],'</p></li>';
						echo '<li><input type="radio" name="q1" value="', $_SESSION["currentQuestion"][6],'" /><p class="options">',$_SESSION["currentQuestion"][6],'</p></li>';
						echo '</ol>';
			    echo '<center><button><input id="btns" type="submit" value="Submit" name="submit"/></button></center></form>';
			    echo' </div>
			  </div>
			</div>';

		echo '</form>';	
		
		
		echo "</center>";
		error_reporting(0);
?>

<?php bottom(); ?>