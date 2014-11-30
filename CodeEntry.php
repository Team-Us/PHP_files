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
            <p>This should show login info, name, etc.</p>
        </div>
        </div>
        <div id="leftcolumnwrap">
        <div id="leftcolumn">
             <p> Topics: 
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
            <button type=submit class="link" name="eID" value="126" >Class Decs,Instances,Access Members</button>    
        </form>
        </p>
        
        </div>
        </div>
        <div id="contentwrap">
        <div id="content">
           <p>
               <?php echo $prompt['Topic']?> Code Entry:
               <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    &emsp;<?php echo($prompt["Prompt"]."<br>&emsp;Answer:");?>
                    <input type = "text" size = "50" name="userEntry" <?php if (isset($_POST['userEntry'])){echo('value="'.$_POST['userEntry'].'"');};?>  >
                    <br>&emsp;&emsp;&emsp;&emsp;&emsp;
                    Omit extra spaces and white spaces.
                    <input type="hidden" name="eID" value="<?php echo $exercise?>">
                    
                    <br>
                    <input type="submit" name="submit" value="Submit" >
        
               </form>
               <?php
                    if(!isset($_POST['userEntry']))
                    {   
                        echo "<br><br>";
                    }
                    checkResponse(($prompt['Answer']), htmlspecialchars($_POST['userEntry']));                    
                ?> 
                
               <form method="post" action="<?php echo $previousPage ?>">
                    <button type=submit  name="eID" value="<?php echo $previous?>" >Previous</button>
               </form>
               <br>
               <br>
               <form method="post" action="<?php echo $nextPage ?>">
                    <button type=submit  name="eID" value="<?php echo $next?>" >Next</button>
               </form>

            
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
