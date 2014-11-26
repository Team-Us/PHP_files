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
        <link rel="stylesheet" href="./dnd_css.css"/>
    </head>
    <body>
        
     <?php
        include 'exerciseFunctions.php';
        
        $exercise=$_POST["eID"];
        
        $dbConnected=connectToDatabase();
        
        $options=  getMultipleChoiceOptions($exercise, $dbConnected); 
        
        $prompt=getPromptData($exercise,$dbConnected);
        
        function checkSet($option)
        {
            if(isset($_POST['userEntry']) && $_POST['userEntry']==$option)
            {
                echo ' checked="true"';
            }
        }
        ?>
        <!-- form is created, and dynamically populated with the data retrieved from the database, and it posts to this same page-->
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
       
      <?php
            checkResponse($prompt['Answer'],$_POST['userEntry'] );
            
       ?><!-- end php post entry-->
        
        
    </body>
</html>
