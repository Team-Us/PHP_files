<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta charset="UTF-8">
<title>Team US - Feedback</title>
</head>
<body>
<div id="Header"> put in Team US logo info here </div>
<div class="feedback">
  <form name="Feedback" action="feedback.php" method="POST" enctype="application/x-www-form-urlencoded">
    <!-- use php here to get username and email to auto fill in-->
    <?php
					//get data base conneciton
					include 'exerciseFunctions.php';
					$dbConnection=connectToDatabase();
			
					//get userinfo
					$userTable = "users";
					$DBQuery = "SELECT * FROM `$userTable` WHERE `uID` = '".$_GET['uID']."'";
			
					$DBResult = mysql_query($DBQuery,$dbConnection);
					$rows=mysql_fetch_array($DBResult);
					mysql_close($dbConnection);
				?>
    <table>
      <tr>
        <td><input name="uID" type="hidden" value="<?php echo $_GET['uID']; ?>">
          Name: </td>
        <td><?php echo $rows['Name']; ?>
          <input name="Name" type="hidden" value="<?php echo $rows['Name']; ?>"></td>
      </tr>
      <tr>
        <td> UserName: </td>
        <td><?php echo $rows['UserName']; ?>
          <input name="UserName" type="hidden" value="<?php echo $rows['UserName']; ?>"></td>
      </tr>
      <tr>
        <td> Email:</td>
        <td><?php echo $rows['Email']; ?>
          <input name="Email" type="hidden" value="<?php echo $rows['Email']; ?>"></td>
      </tr>
      <tr>
        <td> Topic: </td>
        <td><?php echo 'TOPIC';  ?>
          <br>
          <input name="topic" type="hidden" value="<?php echo 'TOPIC'; ?>"></td>
      </tr>
    </table>
    <textarea name="Feedback" rows="10" cols="80">
                </textarea>
    <br>
    <br>
    <input type="submit" value="SendFeedback" name="Send Feedback" />
  </form>
</div>

</body>
</html>
