<?php
if (isset($_GET['uID'])){
	$Name=$_GET['uID'];
echo'
      <p>Topics:
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="1" >Ints and Strings</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="9" >Variable Declarations</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="17" >Scanner</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="23" >Selection Statements</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="28" >Enums</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="35" >ArrayList&lt;E&gt;</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="41" >Class Arrays</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="49" >Passing Arrays as Arguments</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="53" >For Loop</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="60" >Char</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="67" >While Loop(Sentinel Controlled)</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="72" >Logical Operators </button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="87" >Compound Operators</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="97" >Promotion and Casting</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="105" >Double and Float</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="9" >Constructors</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="120" >Fields</button>
      </form>
      <form  method="post" action="MultipleChoice.php?uID=',$Name,'">
        <button type=submit class="link" name="eID" value="126" >Class Decs,Instances,Member Access</button>
      </form>
      </p>
	  ';
}else{
//not logged in no topics are seen yet
	
}

?>

