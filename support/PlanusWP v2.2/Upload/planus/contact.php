<?php

//response generation function
$response = "";

//get variables from option panel
if ( function_exists( 'ot_get_option' ) ) {
	$contact_title = ot_get_option( 'contact_title' );
	$contact_content = ot_get_option( 'contact_content' );
	$contact_email = ot_get_option( 'contact_email' );
	$contact_subject = ot_get_option( 'contact_subject' );
	$contact_adress = ot_get_option( 'contact_adress' );
	$contact_phone = ot_get_option( 'contact_phone' );
}

//function to generate response
function generate_response($type, $errors){
	global $response;
	if($type == "success") { 
		$response = "<div class='success'>{$errors}</div>";
	} else {
		$response = "<div class='error'>{$errors}</div>";
	}
}

//response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];

//php mailer variables
$to = $contact_email;
$subject = $contact_subject;

$body = '<html><body>';
$body .= '<h2>'.__( 'Hello, you have an email from your website!', 'planuswp' ).'</h2>';
$body .= '<p><strong>'.__('Sender', 'planuswp').':</strong> '.$name.'</p>';
$body .= '<p><strong>'.__('Email', 'planuswp').':</strong> '.$email.'</p>';
$body .= '<h3>'.__('Message', 'planuswp').':</h3>';
$body .= '<p>'.strip_tags($message).'</p>';
$body .= '</body></html>';

$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: ". $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if(!$human == 0){
	if($human != 7) generate_response("error", $not_human);
	else {

		//validate email
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			generate_response("error", $email_invalid);
		else {

			//validate presence of name and message
			if(empty($name) || empty($message)){
				generate_response("error", $missing_content);
			} else {

				$sent = mail($to, $subject, $body, $headers);
				if($sent) {
					generate_response("success", $message_sent);
					unset($_POST["message_name"]);
					unset($_POST["message_email"]);
					unset($_POST["message_text"]);
					unset($_POST["message_human"]);
				} else {
					generate_response("error", $message_unsent);
				}
			}
		}
	}
}
else if ($_POST['submitted']) generate_response("error", $missing_content);

?>