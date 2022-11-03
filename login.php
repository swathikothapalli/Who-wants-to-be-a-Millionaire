<!--
Login page
This page takes input details of username and password
-->
<?php include("common.php");?>
<?php top1(); ?>

<div class = "welcome">
<form action="login-submit.php" method="get">

    <div class = "fieldset">
                <!--
                Name: 16 letter input box. Initially empty. Submits to the server as a query
                parameter name.
                -->
                
                
                    <strong>User Name</strong><br><br>
                    <input class = "input" type="text" name="username" size="16" placeholder = "enter user name" required /><br><br>
                
                <!--
                Password: 10 letter input box. Initially empty. Submits to the server as a query
                parameter name.
                -->
              
                    <strong>Password</strong><br><br>
                    <input class = "input" type="password" name="password" size="10" placeholder = "enter password" required />
                
            
                <input class="btnn" type="submit" value="Login"/>
                <p> new user ? </p>
                <a class="link" href="signup.php">Sign up</a>
        
    </div>
</form>
</div>

<?php bottom(); ?>