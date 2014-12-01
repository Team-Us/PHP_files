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
<title></title>
</head>
<body>
<?php
        include 'exerciseFunctions.php';
        $exercise=$_POST["eID"];
        $prompt=getPromptData($exercise);
        $next=$prompt['NextPrompt'];
        $nextPage=getPageInfo($next);
        $previous=$prompt['PreviousPrompt'];
        $previousPage=getPageInfo($previous); 
        if(!isset($_POST['count']))
        {
            $_POST['count']=0;
        }
        
        
        ?>

<!--
        The following input text field's value is dynamically set via PHP if an answer has already been submitted.
        -->
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
      <p> Code Entry:
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]),'?uID=',$_GET['uID'];?>">
        <?php echo("".$prompt["Prompt"]."<br>Answer:");?>
        <input type = "text" size = "50" name="userEntry" <?php if (isset($_POST['userEntry'])){echo('value="'.$_POST['userEntry'].'"');};?>  >
        <input type="hidden" name="eID" value="<?php echo $exercise?>">
        <br>
        <input type="submit" name="submit" value="Submit" >
      </form>
      <?
                if(!isset($_POST['userEntry']))
                {   
                    echo "<br><br>";
                }
                php checkResponse($prompt["Answer"], $_POST['userEntry'])?>
      <form method="post" action="<?php echo $previousPage,'?uID=',$_GET['uID'] ?>">
        <button type=submit  name="eID" value="<?php echo $previous,'?uID=',$_GET['uID']?>" >Previous</button>
      </form>
      <br>
      <br>
      <form method="post" action="<?php echo $nextPage,'?uID=',$_GET['uID'] ?>">
        <button type=submit  name="eID" value="<?php echo $next,'?uID=',$_GET['uID']?>" >Next</button>
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
