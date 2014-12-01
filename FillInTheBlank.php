<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="./4691.css"/>
</head>
<body>
<?php
        include 'exerciseFunctions.php';
        //Fields for testing only, the links to exercises need to be in a form, which posts the eID, to be called.
        //There may also need to be a php page that checks the topic of a given exercise, which then posts the eID
        //to the proper page.
        $exercise=$_POST["eID"]+0;
        $prompt=getPromptData($exercise);
        $next=$prompt['NextPrompt'];
        $nextPage=getPageInfo($next);
        $previous=$prompt['PreviousPrompt'];
        $previousPage=getPageInfo($previous); 
        
        ?>
<div id="wrapper">
  <div id="navigationwrap">
    <div id="navigation">
      <?php include "Header.php" ?>
    </div>
  </div>
  <div id="leftcolumnwrap">
    <div id="leftcolumn">
      <?php include "topics.php"; ?>
    </div>
  </div>
  <div id="contentwrap">
    <div id="content">
      <p> Fill In The Blank:
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]),'?uID=',$_GET['uID'];?>">
        <?php echo("".$prompt["Prompt"]."<br>Answer:");?> 
        <!--
        The following input text field's value is dynamically set via PHP if an answer has already been submitted.
        -->
        <input type = "text" size = "20" name="userEntry" <?php if (isset($_POST['userEntry'])){echo('value="'.$_POST['userEntry'].'"');};?>  >
        <input type="hidden" name="eID" value="<?php echo $exercise?>">
        <br>
        <input type="submit" name="submit" value="Submit" >
      </form>
      <?php 
       if(!isset($_POST['userEntry']))
                {   
                    echo "<br><br>";
                }
       checkResponse($prompt["Answer"], $_POST['userEntry'])  ?>
      <form method="post" action="<?php echo $previousPage,'?uID=',$_GET['uID'] ?>">
        <button type=submit  name="eID" value="<?php echo $previous?>" >Previous</button>
      </form>
      <form method="post" action="<?php echo $nextPage,'?uID=',$_GET['uID'] ?>">
        <button type=submit  name="eID" value="<?php echo $next?>" >Next</button>
      </form>
      </p>
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
</body>
</html>
