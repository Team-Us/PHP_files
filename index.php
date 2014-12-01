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
<title>Team US Main Page</title>
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
    <?php include "topics.php"; ?>


    </div>
  </div>
  <div id="contentwrap">
    <div id="content">
      <p>Welcome to our website. We hope you can get some help with learning how to program in Java here. Best of luck in your CSIS 1400 endeavors.</p>
      <?php
			   //check to see if logged in if not then give log in info here
			   
                    if (!isset($_GET['uID'])){
				   
                        include "Login.php";
			   
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
