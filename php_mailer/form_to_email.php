<?php
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

$name=$_POST['name'];
$customer_email=$_POST['email'];
$customer_message=$_POST['message'];
$email_subject="New Order";
$email_body="You have received a new message from $name.\n Email address:$customer_email\n Here is the message:$customer_message\n";
$upkar_email="samina.lohawala@gmail.com";
$headers="From:$customer_email \r\n";
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';

$mail->Host = "relay-hosting.secureserver.net";

//$mail->SMTPSecure = 'tls';                            

$mail->Port = 25;

//$mail->SMTPAuth = true;

$mail->Username = "samina.lohawala@gmail.com";

$mail->Password = "ukpsbcc1191!";
$mail->setFrom($customer_email, $name);

$mail->addReplyTo($customer_email, $name);

$mail->addAddress($upkar_email, 'Samina');

$mail->Subject = $email_subject;

$mail->Body = $email_body;


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: Mail not sent " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>

