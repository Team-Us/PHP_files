<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./dnd_css.css"/>
        <title></title>

    </head>
    <body>
        Welcome!<br>
        <form  method="post" action="FillInTheBlank.php">
            <button type=submit class="link" name="eID" value="4" >Fill In The Blank</button>    
        </form>
        <br>
        <form name="nav" method="post" action="MultipleChoice.php">
            <button type=submit class="link" name="eID" value="1" >Multiple Choice</button>    
        </form>
        <br>
        <br>
        <form method="post" action="CodeEntry.php">
            <button type=submit class="link" name="eID" value="5" >Code Entry</button>    
        </form>
        <br>
        <br>
        <form method="post" action="DragAndDrop.php">
            <button type=submit class="link" name="eID" value="8" >Drag And Drop</button>    
        </form>
        <br>
    </body>
</html>
