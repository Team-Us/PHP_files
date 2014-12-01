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
        $exercise=$_POST["eID"];
        $dbConnected=connectToDatabase();
        $options=  getMultipleChoiceOptions($exercise, $dbConnected); 
        $prompt=getPromptData($exercise,$dbConnected);
        $next=$prompt['NextPrompt'];
        $nextPage=getPageInfo($next);
        $previous=$prompt['PreviousPrompt'];
        $previousPage=getPageInfo($previous); 
        ?>
        <!-- form is created, and dynamically populated with the data retrieved from the database, and it posts to this same page-->

            
            
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]),'?uID=',$_GET['uID'];?>">
            Multiple Choice:
            <br>
            <?php echo($prompt["Prompt"]);?>
            <br>
            <input type="radio" name="userEntry"  value="a" <?php checkSet("a")?>>a. <?php echo ($options['OptionA'])?><br>
            <input type="radio" name="userEntry"  value="b" <?php checkSet("b")?>>b. <?php echo ($options['OptionB'])?><br>
            <input type="radio" name="userEntry"  value="c" <?php checkSet("c")?>>c. <?php echo ($options['OptionC'])?><br>
            <input type="radio" name="userEntry"  value="d" <?php checkSet("d")?>>d. <?php echo ($options['OptionD'])?><br>
            <input type="hidden" name="eID" value="<?php echo $exercise?>">
            <div>
                <button type="submit">Submit</button>
            </div>
        </form><div>
       <?php
            if(!isset($_POST['userEntry']))
            {
                echo "<br><br>";
            }
            checkResponse($prompt['Answer'],$_POST['userEntry'] );
            mysqli_close($dbConnected);
      ?> 
        </div>
            <form  method="post" action="<?php echo $previousPage,'?uID=',$_GET['uID'] ?>">
                <div>
                <button type="submit"  name="eID" value="<?php echo $previous,'?uID=',$_GET['uID']?>" >Previous</button>
                </div>
            </form>
            
            <form  method="post" action="<?php echo $nextPage,'?uID=',$_GET['uID'] ?>">
                <div>
                <button type="submit"  name="eID" value="<?php echo $next,'?uID=',$_GET['uID']?>" >Next</button>
                </div>
            </form>

           
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
 
            
       </div>
         
    </body>
</html>
