<!--
Signup Page.
-->
<?php include("common.php");?>
<?php top1(); ?>
<div class="welcome">
<form action="signup-submit.php" method="post">
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
                
            
                <input class="btnn" type="submit" value="Sign up"/>
</div>
</div>
</div>
<?php bottom()  ?>