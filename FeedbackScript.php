<?php
//ini_set("display_errors","2");
//ERROR_REPORTING(E_ALL);


// ------------- CONFIGURABLE SECTION ------------------------

// $mailto - set to the email address you want the form // sent to, eg
//$mailto		= "youremailaddress@example.com" ;
$uID = $_POST['uID'];
$domain = $_SERVER["SERVER_NAME"]; // for use in the displayed text (i.e. www.domain.com)
$domain = substr($domain,4);

$mailto = 'webcontact@'.$domain ;


// $subject - set to the Subject line of the email, eg
//$subject	= "Feedback Form" ;

$subject = "User Feedback Form" ;

// the pages to be displayed, eg
//$formurl		= "http://www.example.com/feedback.html" ;
//$errorurl		= "http://www.example.com/error.html" ;
//$thankyouurl	= "http://www.example.com/thankyou.html" ;

$formurl = "";
$errorurl = "";
$thankyouurl = "FeedbackThankYou.php?uID=".$uID;

$uself = 0;

// -------------------- END OF CONFIGURABLE SECTION ---------------

$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ; $name = $_POST['Name']; $email = $_POST['Email'] ; $comments = $_POST['Feedback'] ; $topic=$_POST['topic'] ; $http_referrer = getenv( "HTTP_REFERER" );

if (!isset($_POST['Email'])) {
	header( "Location: $formurl" );
	exit ;
}
if (empty($name) || empty($email) || empty($comments)) {
   header( "Location: $errorurl" );
   exit ;
}
if ( ereg( "[\r\n]", $name ) || ereg( "[\r\n]", $email ) ) {
	header( "Location: $errorurl" );
	exit ;
}

if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =

	"This message was sent from:\n" .
	"$http_referrer\n" .
	"\n" .
	"Name of Sender: $name\n" .
	"\n" .
	"Email of sender: $email\n" .
	"\n" .
	"Feedback:\n\n" .
	"$comments\n" .
	"\n\n";

mail($mailto, $subject, $messageproper,	"From: \"$name\" <$email>".$headersep."Reply-To: \"$name\" <$email>".$headersep."Return-Path: contact@".$domain.$headersep."X-Mailer: chfeedback.php 2.07" ); 


//echo $mailto."<br>";
//echo $subject."<br>";
//echo $messageproper."<br>";
//echo $thankyouurl."<br>";

header( "Location: $thankyouurl" ); 
exit ;

?> 

