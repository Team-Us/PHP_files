<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="./4691.css"/>
<title>Team US - Create Account</title>
<?php include 'exerciseFunctions.php' ?>
</head>
<body>
<div id="wrapper">
  <div id="navigationwrap">
    <div id="navigation">
    <div id="navigation">
      <?php include "Header.php" ?>
    </div>
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

<?php
            //get data base conneciton
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
