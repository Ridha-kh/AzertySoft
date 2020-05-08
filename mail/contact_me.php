<style>
td a {
color:white !important;
}
</style>

<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['message'];

// Create the email and send the message
 $to = 'guetatanouar@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                   $headers = "From: " . strip_tags($email) . "\r\n";

					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

					$message = '<html><body>';
 					$message .= '<img src="http://www.azertysoft.com/img/favicon.ico"><p style="color: #3c5a96; font-size: 15px; font-weight: bold;">azertysoft.com</p><table rules="all" style="border-color: #3c5a96c9;border: 1px; margin: auto;  width: 60%;" cellpadding="10">';
					$message .= "<tr style='background: #3c5a96c9; color: white; border-color: #3c5a96c9;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
					$message .= "<tr style='border-color: #3c5a96c9;'><td><strong>Phone:</strong> </td><td>" . strip_tags($phone) . "</td></tr>";
					$message .= "<tr style='background: #3c5a96c9; color: white; border-color: #3c5a96c9;'><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
					$message .= "<tr style=' border-color: #3c5a96c9;'><td><strong>Message:</strong> </td><td>" . $msg . "</td></tr>";

					$message .= "</table>";
					$message .= "</body></html>";
mail($to,$email_subject,$message,$headers);
return true;			
?>