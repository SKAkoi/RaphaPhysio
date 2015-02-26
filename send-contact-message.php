<?php
if(!isset($_POST['submit']))
{
#This page should not be submitted directly. Need to submit the form.
	echo "error; you need to submit the form";
}
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$visitor_email = $_POST['email'];
$location = $_POST['location'];
$phnumber = $_POST['phonenumber'];
$message = $_POST['message'];

#Validate first
if(empty($fname)||empty($lname)||empty($location)||empty($phnumber)||empty($message))
{
	echo "Your name, email, phone number and location are mandatory";
	exit();
}

$email_from = 'user@raphaphysio.com'; #Client's sending email address.
$email_subject = "New Form Submission";
$email_body = "You have received a new message from $fname. \n"
			  "Name: $fname\n"
			  "Email: $visitor_email\n"
			  "Location: $location\n"
			  "Phone Number: $phnumber\n"
			  "Message:\n $message";

$to = "user@raphaphysio.com"; #Client's receiving email address
$headers = "From: $email_from \r\n";

#Send the message
mail($to,$email_subject,$email_body,$headers);

#Done. Redirect to thank you page
header('Location: contact-thank-you.html');
exit();
?>
