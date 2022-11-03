<?php 
/**
 * Common HTML header code for every page in the site.
 *  Extra feature #3. LGBT matches feature is added which matches based on seeking gender
 */
function top() {
  echo '<html><head> <meta charset="UTF-8">
  <link rel="stylesheet" href= "styles.css" type = "text/css">
  <title>Who wants to be a Millionaire?</title>
  <div class="name">
<h1>Who wants to be a Millionaire?</h1>
</div>
  <ul class = "navbar">
  <li class = "navitems">
  <a href="logout.php">Logout</a>
</li>
  <li class = "navitems">
  <a href="summary.php">Summary</a>
  </li>
  <li class = "navitems">
      <a href="about.php">About</a>
  </li>
  <li class = "navitems">
  <a href="gamerules.php">Game Rules</a>
</li>
<li class = "navitems">
  <a href="leaderboard.php">Leader Board</a>
  </li>
  
</ul>
</head><body>';
}
function top1() {
    echo '<html><head> <meta charset="UTF-8">
    <link rel="stylesheet" href= "styles.css" type = "text/css">
    <title>Who wants to be a Millionaire?</title>
    <div class="name">
  <h1>Who wants to be a Millionaire?</h1>
  </div>
    <ul class = "navbar">
    <li class = "navitems">
    <a href="summary.php">Summary</a>
    </li>
    <li class = "navitems">
        <a href="about.php">About</a>
    </li>
    <li class = "navitems">
    <a href="gamerules.php">Game Rules</a>
  </li>
  <li class = "navitems">
    <a href="leaderboard.php">Leader Board</a>
    </li>
    <li class = "navitems">
    <a href="signup.php">Sign up</a>
    </li>
    <li class = "navitems">
    <a href="login.php">Login</a>
    </li>
    
  </ul>
  </head><body>';
  }
/**
 * Common HTML footer code for every page in the site.
 */
function bottom(){
    echo '</body></html>';
}

/**
 * Read the name from the page's "name" query parameter and finds which other singles match the given user.
 * Output the HTML to display the matches, in the order found in the file.
 */
function authenticate_login_details()
{
    $filename = "login.txt";
    $loginUser = "";
    $flag = 0;
    foreach (file($filename, FILE_IGNORE_NEW_LINES) as $loginUser) {
        $each_row = explode(",", $loginUser);
        if ($_GET["username"] == $each_row[0] && $_GET["password"] == $each_row[1]) {
            $flag=1;
            break;
        }
    }
    
    if($flag == 1){
        ?>
        
        <div class =" <p>Welcome to <?php $_GET["username"] ?> </p>
        <?php session_start();
        $_SESSION["username"] = $_GET["username"];
        start_game();
    }
    else{
        echo "<div class='errors'><b>Error! Invalid data.</b>";
        echo "<p>We're sorry. You submitted invalid user information. Please go back and try again.</p>";
        echo "<p>New User ?</p><a class='link' href='signup.php'> Sign up </a></div>";
    }
  
}

function start_game(){
    echo '<div class = "fieldset startgame">
    <button ><a id="btns" href="game.php" name="btn">Start Game</a></button>
    </div>';
    $_SESSION["score"] = 0;
    $_SESSION["questionNumber"] = 1;
    $_SESSION["showHint"] = False;
    $_SESSION["scoreMultiple"] = 10;
    @load_all_questions_once();
}

function load_all_questions_once(){
    $gamefilenameEasy = "questions_easy.txt";
    $gamefilenameMed = "questions_med.txt";
    $gamefilenamehigh = "questions_high.txt";

    $arr = array($gamefilenameEasy, $gamefilenameMed, $gamefilenamehigh);
    $j = 1;
    foreach ($arr as &$value) {
            $easyQuestions = array();
            $handle = fopen($value, "r");
            if ($handle) {
            $i=1;
            while (($line = fgets($handle)) !== false) {
                $data = explode(",", $line);
                $easyQuestions[$i] = array(
                    1 => $data[0],
                    2 => $data[1],
                    3 => $data[2],
                    4 => $data[3],
                    5 => $data[4],
                    6 => $data[5],
                    7 => $data[6],
                    8 => $data[7],
                    9 => $data[8],
                    10 => $data[9]
                );
                $i++;
    }
    fclose($handle);
    shuffle($easyQuestions);
        if($j == 1){
                    $_SESSION["easyQuestionArray"] = (new ArrayObject($easyQuestions))->getArrayCopy();;
                } else if($j == 2){
                    $_SESSION["medQuestionArray"] = (new ArrayObject($easyQuestions))->getArrayCopy();;
                }
                else{
                    $_SESSION["highQuestionArray"] = (new ArrayObject($easyQuestions))->getArrayCopy();;
                }
        }
        $j++;
    }
    
        #print_r($_SESSION["easyQuestionArray"]);
        #print_r ($_SESSION["medQuestionArray"]);
        #print_r( $_SESSION["highQuestionArray"]);

    }



function update_leaderboard(){
        $filename="leaderboard.txt";
        $leaderboardUser ="";
        $assoc_arr = array();
        foreach (file($filename, FILE_IGNORE_NEW_LINES) as $leaderboardUser) {
            $each_row = explode(",", $leaderboardUser);
            $assoc_arr[$each_row[0]] = $each_row[1];
        }
    
        $assoc_arr_row_value = 0;
    
        if (array_key_exists($_SESSION["username"], $assoc_arr)) {
           $assoc_arr_row_value =  $assoc_arr[$_SESSION["username"]];
        }
            
            $assoc_arr[$_SESSION["username"]] = max($_SESSION["score"],$assoc_arr_row_value);
            arsort($assoc_arr);
            $f = fopen($filename, 'w'); 
     
            foreach ($assoc_arr as $key => $value) {
                $data = $key.",".$value."\n";
                fwrite($f, $data);
            }
            fclose($f);
    }
    

function display_leaderboard(){
    $filename="leaderboard.txt";
    $assoc_arr = array();
    foreach (file($filename, FILE_IGNORE_NEW_LINES) as $leaderboardUser) {
        $each_row = explode(",", $leaderboardUser);
        $assoc_arr[$each_row[0]] = $each_row[1];
    }
    echo '<br><div class = "headings"><h1>Leader Board</h1></div><br>';
    echo '<br><br><table id="customers">
    <tr>
      <th>User Name</th>
        <th>High Score</th>
    </tr>';
    foreach ($assoc_arr as $key => $value) {
        echo '<tr>';
        echo '<td>'.$key.'</td>';
        echo '<td>'.$value.'</td>';
        echo '</tr>';
    }
    echo '</table>';
}

function newWriteToFile()
{
    $filename="login.txt";
    $userInfo = "";
    foreach ($_POST as $attribute) {
        $userInfo = $userInfo . $attribute . ",";
    }
    file_put_contents($filename, "\n" . substr($userInfo, 0, -1), FILE_APPEND);
}
function validateUserAlreadyExists(){
    $filename = "login.txt";
    $loginUser = "";
    $flag = 0;
    foreach (file($filename, FILE_IGNORE_NEW_LINES) as $loginUser) {
        $each_row = explode(",", $loginUser);
        if ($_POST["username"] == $each_row[0] && $_POST["password"] == $each_row[1]) {
            $flag=1;
            break;
        }
    }

    if($flag == 1){
        return false;
    }
    else{
        return true;
    }

}
function logout()
{
unset($_SESSION['username']);  
session_destroy();  
header("location:index.html");
}
?>