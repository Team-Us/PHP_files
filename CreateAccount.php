<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<div id="Header"> put in Team US logo info here </div>
<?php
            //get data base conneciton
            include 'exerciseFunctions.php';
            $dbConnection=connectToDatabase();
            //get userinfo
            $userTable = "users";
            
            //names are always caps first 
            $DBQuery = "INSERT INTO $userTable (`Name` ,`Instructor` ,`Email` ,`Username` ,`Password` ,`Active` ,`ActiveDate`) VALUES ('".ucfirst($_POST['Name'])."', '".ucfirst($_POST['Instructor'])."', '".$_POST['Email']."', '".$_POST['Username']."', '".$_POST['Password']."','1', NOW())";	
			//echo $DBQuery;
            $DBResult = mysql_query($DBQuery,$dbConnection);
            if ($DBResult){
                //added new record to database
                header("Location: index.php");
            }else{
                //failed to add to database
				echo "There was a problem updating the Database notify someone, please.  I really need some help here.";
            }
            

        
            
            
        ?>
</body>
</html>
