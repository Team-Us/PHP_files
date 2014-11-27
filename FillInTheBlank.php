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
        //Fields for testing only, the links to exercises need to be in a form, which posts the eID, to be called.
        //There may also need to be a php page that checks the topic of a given exercise, which then posts the eID
        //to the proper page.
        $exercise=$_POST["eID"]+0;
        $prompt_data=getPromptData($exercise);
        
        
        ?>
        Fill In The Blank:
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php echo("".$prompt_data["Prompt"]."<br>Answer:");?>
        <!--
        The following input text field's value is dynamically set via PHP if an answer has already been submitted.
        -->
        <input type = "text" size = "20" name="userEntry" <?php if (isset($_POST['userEntry'])){echo('value="'.$_POST['userEntry'].'"');};?>  >
        <input type="hidden" name="eID" value="<?php echo $exercise?>">
        <br>
        <input type="submit" name="submit" value="Submit" >
        </form>
        
       <?php checkResponse($prompt_data["Answer"], $_POST['userEntry'])  ?> 
    </body>
</html>
