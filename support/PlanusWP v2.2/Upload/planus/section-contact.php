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
	if($human != 7) $response = '<p class="error">'.$not_human.'</p>';
	else {
		//validate email
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			$response = '<p class="error">'.$email_invalid.'</p>';
		else {
			//validate presence of name and message
			if(empty($name) || empty($message)){
				$response = '<p class="error">'.$missing_content.'</p>';
			} else {
				$sent = mail($to, $subject, $body, $headers);
				if($sent) {
					$response = '<p class="success">'.$message_sent.'</p>';
					unset($_POST['message_name']);
					unset($_POST['message_email']);
					unset($_POST['message_text']);
					unset($_POST['message_human']);
				} else {
					$response = '<p class="error">'.$message_unsent.'</p>';
				}
			}
		}
	}
}
else if ($_POST['submitted']) $response = '<p class="error">'.$missing_content.'</p>';

?>

<!-- Contact Section -->
<section id="contact" class="cbp-so-section" style="<?php custom_bg_section('contact_background_settings'); ?>">
	<div class="container cbp-so-side cbp-so-side-top">
		<h1><?php echo $contact_title ?></h1>

		<?php echo $contact_content ?>
		<div class="row">
			<div class="col-sm-2 col-sm-offset-3">
				<div class="icon">
					<i class="fa fa-map-marker fa-2x"></i>
				</div>
				<p class="contact-meta"><?php echo $contact_adress ?></p>
			</div>
			<div class="col-sm-2">
				<div class="icon">
					<i class="fa fa-envelope fa-2x"></i>
				</div>
				<p class="contact-meta"><?php echo $contact_email ?></p>
			</div>
			<div class="col-sm-2">
				<div class="icon">
					<i class="fa fa-phone fa-2x"></i>
				</div>
				<p class="contact-meta"><?php echo $contact_phone ?></p>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php echo $response; ?>
				<form action="<?php echo home_url(); ?>/#contact" method="post" role="form" id="contact-form">
					<div class="form-group">
						<input type="text" class="form-control input-lg" id="nameinput" placeholder="<?php _e('Name', 'planuswp') ?>" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
					</div>
					<div class="form-group">
						<input type="email" class="form-control input-lg" id="emailinput" placeholder="<?php _e('Email', 'planuswp') ?>" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="10" name="message_text" placeholder="<?php _e('Message', 'planuswp') ?>"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-lg" id="humaninput" placeholder="5 + 2 =" style="width: 100px;" name="message_human">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-white btn-big btn-round">Submit</button>
					</div>
					<input type="hidden" name="submitted" value="1">
				</form>
			</div>
		</div>


	</div>
</section>
<!-- End of Contact Section -->

<!-- Map Section -->
<?php if ( function_exists( 'ot_get_option' ) && ot_get_option( 'map_page' ) !='' ) {
	echo '<section id="map" class="map-section">';
		$page_ID = ot_get_option( 'map_page' );
		$post = get_post($page_ID); 
		$content = $post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
	echo '</section>';
}
?>
<!-- End of Map Section -->