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
    </head>
    <body>
        
     <?php
        include 'exerciseFunctions.php';
        $_POST["eID"]=1;
        $exercise=$_POST["eID"];
        //functions all included in exerciseFunctions.php
        
 
        
        $dbConnected=  connectToDatabase();
        $prompt=getPromptData($exercise,$dbConnected);
        $options=  getMultipleChoiceOptions($exercise, $dbConnected); 
          
        ?>
        <!-- form is created, and dynamically populated with the data retrieved from the database, and it posts to this same page-->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Multiple Choice:
            <br><?php echo($prompt["Prompt"]);?><br>
            <?php echo ($options['OptionA'])?><br>
            <input type="radio" name="userEntry"  value="a">a. <?php echo ($options['OptionA'])?><br>
            <input type="radio" name="userEntry"  value="b">b. <?php echo ($options['OptionB'])?><br>
            <input type="radio" name="userEntry"  value="c">c. <?php echo ($options['OptionC'])?><br>
            <input type="radio" name="userEntry"  value="d">d. <?php echo ($options['OptionD'])?><br>
            <input type="submit" name="submit" value="Submit" >
        </form>
       
      <?php
            checkResponse($prompt['answer'],$_POST['userEntry'] );
            mysql_close($dbConnected);
       ?><!-- end php post entry-->
        
        
    </body>
</html>
