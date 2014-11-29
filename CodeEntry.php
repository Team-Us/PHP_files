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
        $exercise=$_POST["eID"];
        $prompt=getPromptData($exercise);
        $next=$prompt['NextPrompt'];
        $nextPage=getPageInfo($next);
        $previous=$prompt['PreviousPrompt'];
        $previousPage=getPageInfo($previous); 
        ?>
        Code Entry:
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php echo("".$prompt["Prompt"]."<br>Answer:");?>
        <!--
        The following input text field's value is dynamically set via PHP if an answer has already been submitted.
        -->
        <input type = "text" size = "50" name="userEntry" <?php if (isset($_POST['userEntry'])){echo('value="'.$_POST['userEntry'].'"');};?>  >
        <input type="hidden" name="eID" value="<?php echo $exercise?>">
        <br>
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
       <?php checkResponse($prompt_data["Answer"], $_POST['userEntry'])  ?> 
    </body>
</html>
