<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer; //use phpmailer to send email

$dir = 'files';
$attachments = scandir($dir); //create array of upload files

$mail->isSMTP();                                  
$mail->Host = 'example.host.com';  					  
$mail->SMTPAuth = true;                              
$mail->Username = 'example@email.com';              
$mail->Password = 'password';                           
$mail->SMTPSecure = 'tls';                            
$mail->Port = 587;                                   
$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addAddress($_POST['rec_email'], $_POST['rec_name']);
$mail->Subject = $_POST['subject'];
$message = 	'<body><table>';
$message .=	'<tr><td><strong>From:</strong> </td><td>'.$_POST['name'].','.$_POST['email'].'</td></tr>';
$message .=	'<tr><td><strong>To:</strong> </td><td>'.$_POST['rec_name'].','.$_POST['rec_email'].'</td></tr>';
$message .=	'<tr><td><strong>Title:</strong></td><td>'.$_POST['subject'].'</td></tr>';
$message .=	'<tr><td><strong>Message:</strong></td><td>'.$_POST['message'].'</td></tr>';
$message .=	'</table></body>'; 
$mail->Body = $message;                
foreach($attachments as  $value) { 			//upload files to email
$mail->AddAttachment("uploads"."/".$value);
};  
?>