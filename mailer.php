

<?php


include_once "swiftmailer/lib/swift_required.php";

if(isset($_POST['url']) && $_POST['url'] == ''){
 
 $data = array(
'name' => $_POST['name'],
'email' => $_POST['email'],
'messagecontent' => $_POST['messagecontent']
);    

$email_message .= "Name: ".$data['name']."\n";
$email_message .= "Email: ".$data['email']."\n";
$email_message .= "Message: ".$data['messagecontent'];

$transport = Swift_SmtpTransport::newInstance("mail.sullivannolan.com", 465, "ssl") 
->setUsername("hello@sullivannolan.com")
->setPassword("Scones247");

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance("Message From SullivanNolan")
->setFrom(array("hello@sullivannolan.com" => "Sullivan Nolan"))
->setTo(array("nolakat@gmail.com"))
->setBody($email_message);

// Send the message
$result = $mailer->send($message);

}

?>