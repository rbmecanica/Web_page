<?php
//incluimos la clase PHPMailer
require_once('library_email/class.phpmailer.php');
require_once('library_email/class.smtp.php');

try {
	if(isset($_POST['name'])&&!empty($_POST['name'])&&isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['message'])&&!empty($_POST['message'])){
$mail  = new PHPMailer(); // defaults to using php "mail()"
$mail->IsSMTP();
$mail->SMTPDebug  = 1;
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465 ;
$mail->SMTPAuth = true;
$mail->Username = "servicioautomotrizrb@gmail.com";
$mail->Password = "automotrizrb";

$mail->SetFrom($_POST['email'], $_POST['name']);
$mail->AddAddress("servicioautomotrizrb@gmail.com");

$mail->Subject    = $_POST['name'];
$mail->MsgHTML($_POST['name']);
$mail->IsHTML(true);
$mail->Body="Nombre del usuario: ".$_POST['name']."<br>Mensaje del usuario: ".$_POST['message']."<br>Correo del usuario: ".$_POST['email'];
	$mail->Send();
header('Location: /consulta.html?mensaje=exitoso');
}
   
} catch (Exception $e) {
 header('Location: /consulta.html?mensaje=error');
}