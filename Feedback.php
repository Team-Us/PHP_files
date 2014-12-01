<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="./4691.css"/>
<title>Team US - Feedback</title>
<?php include 'exerciseFunctions.php' ?>
</head>
<body>
<div id="wrapper">
  <div id="navigationwrap">
    <div id="navigation">
      <?php include "Header.php" ?>
    </div>
  </div>
  <div id="leftcolumnwrap">
    <div id="leftcolumn">
      <p>Topics:
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="1" >Ints and Strings</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="9" >Variable Declarations</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="17" >Scanner</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="23" >Selection Statements</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="28" >Enums</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="35" >ArrayList&lt;E&gt;</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="41" >Class Arrays</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="49" >Passing Arrays as Arguments</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="53" >For Loop</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="60" >Char</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="67" >While Loop(Sentinel Controlled)</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="72" >Logical Operators </button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="87" >Compound Operators</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="97" >Promotion and Casting</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="105" >Double and Float</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="9" >Constructors</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="120" >Fields</button>
      </form>
      <form  method="post" action="MultipleChoice.php">
        <button type=submit class="link" name="eID" value="126" >Class Decs,Instances,Member Access</button>
      </form>
      </p>
    </div>
  </div>
  <div id="contentwrap">
    <div id="content">
      <div class="feedback">
        <form name="Feedback" action="feedback.php?uID=<?php echo $_GET['uID'] ?>" method="POST" enctype="application/x-www-form-urlencoded">
          <!-- use php here to get username and email to auto fill in-->
          <?php
					//get data base conneciton
					$dbConnection=connectToDatabase();
			
					//get userinfo
					$userTable = "users";
					$DBQuery = "SELECT * FROM `$userTable` WHERE `Username` = '".$_GET['uID']."'";
			
					$DBResult = mysql_query($DBQuery,$dbConnection);
					$rows=mysql_fetch_array($DBResult);
					mysql_close($dbConnection);
				?>
          <table>
            <tr>
              <td><input name="uID" type="hidden" value="<?php echo $_GET['Username']; ?>">
                Name: </td>
              <td><?php echo $rows['Name']; ?>
                <input name="Name" type="hidden" value="<?php echo $rows['Name']; ?>"></td>
            </tr>
            <tr>
              <td> UserName: </td>
              <td><?php echo $rows['Username']; ?>
                <input name="UserName" type="hidden" value="<?php echo $rows['Username']; ?>"></td>
            </tr>
            <tr>
              <td> Email:</td>
              <td><?php echo $rows['Email']; ?>
                <input name="Email" type="hidden" value="<?php echo $rows['Email']; ?>"></td>
            </tr>
            <tr>
              <td> Topic: </td>
              <td><?php echo 'TOPIC';  ?> <br>
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
    </div>
  </div>
  <div id="footerwrap">
    <div id="footer">
      <?php
            include "footer.php";
          ?>
    </div>
  </div>
</div>
<br>
<br>
</body>
</html>
