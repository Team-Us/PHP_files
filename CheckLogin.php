<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<div id="Header"> put in Team US logo info here </div>
<?php
        //do the login check.  
        //get data base conneciton
        include 'exerciseFunctions.php';
        $dbConnection=connectToDatabase();

        //get userinfo
        $userTable = "users";
        $DBQuery = "SELECT * FROM `$userTable` WHERE `UserName` = '".$_POST['userName']."' AND `Password` = '".$_POST['password']."'";

        $DBResult = mysql_query($DBQuery,$dbConnection);

        if (mysql_num_rows($DBResult) == 1){
            //if matches continue
            header("Location: http://ec2-54-148-50-198.us-west-2.compute.amazonaws.com/index.php");   //this needs modified to where it should go next.  The main page
 
        }else{
            //if not match send back to login.php
            echo("<h1>Your username and password did not match!</h1>");
            echo("<br>");
            echo("<br>");
            echo("Please try and login again.");
            echo("<br>");
            echo("<br>");
            echo("<a href='Login.php'><h2>Try log in Again</h2></a");
            echo("");
        }
        
        mysqli_close($con);
        
        ?>
</body>
</html>
