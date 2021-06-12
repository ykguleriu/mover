<?php
// To avoid unwanted php output
error_reporting(0);
/*
 * ------------------------------------
 * Contact Form Configuration
 * ------------------------------------
 */
 
$to    = "name@example.com"; // <--- Your email ID here

$server_email = 'webmaster@yourdomain.com';  // Your server email to authenticate outgoing emails. eg: name@yourdomain.com
/*
 * ------------------------------------
 * END CONFIGURATION
 * ------------------------------------
 */
 
$name     = $_POST["name"];
$email    = $_POST["email"];
$type     = $_POST["type"];
$website  = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$website = dirname($website);
$website = dirname($website);
$msg = '';

if (isset($email) && isset($name)) {
	if (isset($type) && $type == 'quote') {
		$subject = "New Quote Request from $name"; // <--- Contact Subject here.
		$msg .= 'Hello Admin, <br/> <br/> Here are the quote details:';
	} else {
		$subject = "New Contact Message from $name"; // <--- Contact Subject here.
		$msg .= 'Hello Admin, <br/> <br/> Here are the Message details:';
	}
	
	
	$msg .= ' <br/> <br/> <table border="1" cellpadding="6" cellspacing="0" style="border: 1px solid  #eeeeee;">';
	foreach($_POST as $label => $value) {
		$msg .= "<tr><td width='100'>".ucfirst($label).
		"</td><td width='300'>".$value.
		" </tr>";
	}
	$msg .= " </table> <br> --- <br>This e-mail was sent from $website";
/*
 * ------------------------------------
 * Send Mail via PHP Mailer
 * ------------------------------------
 */

date_default_timezone_set('Etc/UTC');

require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom($server_email, $name);
//Set an alternative reply-to address
$mail->addReplyTo($email, $name);
//Set who the message is to be sent to
$mail->addAddress($to);
//Set the HTML True
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $msg;

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "success";
}

//echo "success";

} // END isset
else {
	echo "Please use POST request";
}

?>