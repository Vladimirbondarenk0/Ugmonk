<?php 

// $name = $_POST['name'];
// $text = $_POST['text'];
$email = $_POST['email'];
// $textarea = $_POST['textarea'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vladimirbond775@gmail.com';                 // Наш логин
$mail->Password = 'kxdmnornrqqfetzd';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('vladimirbond775@gmail.com', '1 client!');   // От кого письмо 
$mail->addAddress('vladimirbond778@gmail.com');     //  Add a recipient
//$mail->addAddress('ellen@example.com'); 	              // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные';  
$mail->Body    = '
		Пользователь оставил данные <br> 
	 
	E-mail: ' . $email . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>