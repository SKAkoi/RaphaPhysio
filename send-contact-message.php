<?php
require_once 'Mail.php';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$visitor_email = $_POST['email'];
$location = $_POST['location'];
$phnumber = $_POST['phonenumber'];
$message = $_POST['message'];
$headers = array(
    'From' => '<kakoi@joomah.com>',
    'To' => '<kakoi@joomah.com>',
    'Subject' => 'New Form Submission'
);

$email_body = "You have received a new message from $fname. \n" .
			  "Name: $fname\n" .
			  "Email: $visitor_email\n" .
			  "Location: $location\n" .
			  "Phone Number: $phnumber\n" .
			  "Message:\n $message";

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'kakoi@joomah.com',
        'password' => 'ardelle1992'
));

$mail = $smtp->send($visitor_email,$headers,$email_body);

#Done. Redirect to thank you page
header('Location: contact-thank-you.html');
exit();
?>
