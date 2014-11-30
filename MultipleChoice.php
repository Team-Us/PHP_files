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
            <p>This should show login info, name, etc.</p>
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
        </form></p>
        </div>
        </div>
        <div id="contentwrap">
        <div id="content">
            <div class="table">
                <div class="row">
                    <div class="promptCell">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <?php echo $prompt['Topic']?> Multiple Choice:<br>
            <br>
            <?php echo($prompt["Prompt"]);?>
            <br>
            <input type="radio" name="userEntry"  value="a" <?php checkSet("a")?>>a. <?php echo ($options['OptionA'])?><br>
            <input type="radio" name="userEntry"  value="b" <?php checkSet("b")?>>b. <?php echo ($options['OptionB'])?><br>
            <input type="radio" name="userEntry"  value="c" <?php checkSet("c")?>>c. <?php echo ($options['OptionC'])?><br>
            <input type="radio" name="userEntry"  value="d" <?php checkSet("d")?>>d. <?php echo ($options['OptionD'])?><br>
            <input type="hidden" name="eID" value="<?php echo $exercise?>">
            </div>
            </div>
                
            <div class="row">
                <div class="cell">
                    <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
                
            
       <?php
            if(!isset($_POST['userEntry']))
            {
                echo "<br><br>";
            }
            checkResponse($prompt['Answer'],$_POST['userEntry'] );
            mysqli_close($dbConnected);
      ?> 
            <div class="row">
                <div class="buttonCell">
                <form  method="post" action="<?php echo $previousPage ?>">
                <button type="submit"  name="eID" value="<?php echo $previous?>" >Previous</button>
                </form>
                </div>
            
                <div class="buttonCell">
                <form  method="post" action="<?php echo $nextPage ?>">
                    <button class="buttonNext" type="submit"  name="eID" value="<?php echo $next?>" >Next</button>
                </form>
                </div>
            
           </div>
        </div>
        </div>
        </div>
        <div id="footerwrap">
        <div id="footer">
            <p> put links to TOS and about page here</p>
        </div>
        </div>
    </div>
 
            
    
         
    </body>
</html>
