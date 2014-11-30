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
        <link rel="stylesheet" href="./preston.css"/>
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
            <div id="leftcolumn">
                
                    <form  method="post" action="FillInTheBlank.php">
                        <button type=submit class="link" name="eID" value="4" >Int</button>    
                    </form>
                    <form method="post" action="MultipleChoice.php">
                        <button type=submit class="link" name="eID" value="1" >Variable Declarations</button>    
                    </form>
                    
                
            </div>
            
            
        <div id="content">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Multiple Choice:
            <br>
            <?php echo($prompt["Prompt"]);?>
            <br>
            <input type="radio" name="userEntry"  value="a" <?php checkSet("a")?>>a. <?php echo ($options['OptionA'])?><br>
            <input type="radio" name="userEntry"  value="b" <?php checkSet("b")?>>b. <?php echo ($options['OptionB'])?><br>
            <input type="radio" name="userEntry"  value="c" <?php checkSet("c")?>>c. <?php echo ($options['OptionC'])?><br>
            <input type="radio" name="userEntry"  value="d" <?php checkSet("d")?>>d. <?php echo ($options['OptionD'])?><br>
            <input type="hidden" name="eID" value="<?php echo $exercise?>">
            
            <input type="submit" name="submit" value="Submit" >
        </form>
          
            <form method="post" action="<?php echo $previousPage ?>">
                <button type=submit  name="eID" value="<?php echo $previous?>" >Previous</button>
            </form>
            <br>
            <br>
            <form method="post" action="<?php echo $nextPage ?>">
                <button type=submit  name="eID" value="<?php echo $next?>" >Next</button>
            </form>
      <?php
            checkResponse($prompt['Answer'],$_POST['userEntry'] );
            mysqli_close($dbConnected);
      ?>
            
       </div>
       </div>     
    </body>
</html>
