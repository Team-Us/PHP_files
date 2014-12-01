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
<title>Create New Account</title>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body>
<script language="JavaScript" type="text/javascript">
	  function CheckRequireds(){
		  //alert("at check");
		  var check = true;
		  if(document.NewAccount.AgreeTermsSerivce.checked==false){
			alert('You must agree to Terms of Service!');
			check = false;
			return false;
		  }else{
			  //alert('no checked');
		  }
	  //verify passwords now
		  if ( (document.NewAccount.Password.value == '') || (document.NewAccount.Password.value != document.NewAccount.ConfirmPassword.value) ){
			  alert ('Passwords do not match or are missing please re-enter!');
			  document.NewAccount.Password.value = '';
			  document.NewAccount.ConfirmPassword.value = '';
			  document.NewAccount.Password.focus();
			  check = false;
			  return false;
		  }
		  if (check){
			  var res = confirm('Are you sure you want to submit your information now?');
			  if (!res) {
				  check = false;
			  }
		  }
	  
		  return check;
	  }//CheckRequireds

	  function setVisibility(id, visibility) {
		  document.getElementById(id).style.display = visibility;
	  }

</script>
<div id="wrapper">
  <div id="navigationwrap">
    <div id="navigation">
    <div id="navigation">
      <?php include "Header.php" ?>
    </div>
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
      </form>
      </p>
    </div>
  </div>
  <div id="contentwrap">
    <div id="content">
    <br><br>
<div class="createAccount">
  <form name="NewAccount" id="NewAccount" action="CreateAccount.php" method="POST" enctype="application/x-www-form-urlencoded">
    <table border="0" cellspacing="3" cellpadding="5">
      <tbody>
        <tr>
          <td>Name</td>
          <td><input type="text" name="Name" value="" size="45" /></td>
        </tr>
        <tr>
          <td>Instructor</td>
          <td><input type="text" name="Instructor" value="" size="45" maxlength="75"/></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><span id="EmailCheck">
            <input type="text" name="Email" value="" size="45" maxlength="255"/>
            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
        </tr>
        <tr>
          <td>Desired Username</td>
          <td><span id="UserName">
            <input type="text" name="Username" value="" size="45" maxlength="75" />
            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span><br>
            <div id="userRequirements_1" style="display:block;" onclick="setVisibility('UserRequirements', 'block');"> <span style="color:blue;text-decoration:underline;font-size:14px;cursor:pointer;"><a>Username Requirements</a></span> </div>
            <div id="UserRequirements" style="display:none;">
              <ul>
                <li>No Special Characters</li>
                <li>Max length of 45 characters</li>
              </ul>
            </div></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><span id="password1">
            <input type="password" name="Password" value="" size="45" maxlength="45"/>
            <span class="passwordRequiredMsg">A value is required.</span><span class="passwordMinCharsMsg">Minimum number of characters not met.</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span><span class="passwordInvalidStrengthMsg">The password doesn't meet the specified strength.</span></span><br>
            <div id="PasswrordRequirements_1" style="display:block;" onclick="setVisibility('PasswordRequirements', 'block');"> <span style="color:blue;text-decoration:underline;font-size:14px;cursor:pointer;"><a>Password Requirements</a></span> </div>
            <div id="PasswordRequirements" style="display:none;">
              <ul>
                <li>No Special Characters</li>
                <li>At least One Lower Case Letter</li>
                <li>At Least One Upper Case Letter</li>
                <li>At Least One Number</li>
              </ul>
            </div></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><span id="sprypassword1">
            <input type="password" name="ConfirmPassword" id="ConfirmPassword">
            <span class="passwordRequiredMsg">A value is required.</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span><span class="passwordMinCharsMsg">Minimum number of characters not met.</span><span class="passwordInvalidStrengthMsg">The password doesn't meet the specified strength.</span></span></td>
        </tr>
        <tr>
          <td colspan="2"><input type="checkbox" name="AgreeTermsSerivce" value="ON" />
            I agree to the <a href="TermsService.php" target="_blank">Terms of Service</a></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="Create Account" name="Create Account" onClick="return CheckRequireds();"/></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>


    </div>
  </div>



<?php
        // put your code here
        ?>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {maxChars:45, minChars:8, minNumbers:1, minUpperAlphaChars:1, minAlphaChars:1});
var sprytextfield1 = new Spry.Widget.ValidationTextField("EmailCheck", "email");
var sprytextfield2 = new Spry.Widget.ValidationTextField("UserName", "custom");
var sprypassword2 = new Spry.Widget.ValidationPassword("password1", {minChars:8, maxChars:45, minAlphaChars:1, minNumbers:1, minUpperAlphaChars:1});
    </script>
  <div id="footerwrap">
    <div id="footer">
      <?php
            include "footer.php";
          ?>
    </div>
  </div>
</div>
<br>
<br>
</body>
</html>
