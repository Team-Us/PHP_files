<!DOCTYPE html>
<!--
Login Page for CSIS 2450 Project
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Team US Login Page</title>
    </head>
    <body>
        <div id="Header">
            put in Team US logo info here
            
        </div>
        <div class="login">
            <form name="Login" action="CheckLogin.php" method="POST" enctype="application/x-www-form-urlencoded">
                <table border="0" cellpadding="5">
                    <tbody>
                        <tr>
                            <td>User Name:</td>
                            <td><input type="text" name="userName" value="" size="45" /></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" value="" size="45" /></td>
                        </tr>
                    </tbody>
                </table>

                <br>
                <br>
                <input class="LoginButton" type="submit" value="Login" name="Login" />
                <br><br>
                <a href="NewAccount.php">Create Account</a>
            </form>
            
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
