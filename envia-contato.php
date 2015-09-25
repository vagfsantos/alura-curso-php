<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail -> isSMTP();
$mail -> Host = "smtp.gmail.com";
$mail -> Port = 587;
$mail -> SMTPSecure = "tls";
$mail -> SMTPAuth = true;

$mail -> Username = "xxx";
$mail -> Password = "xxx";

$mail -> setFrom("xxx", "Vagner Santos");
$mail -> addAddress("xxx");
$mail -> Subject = "Email de contato da loja";

$mail -> msgHTML("<html>
	De: {$nome} <br/>
	Email: {$email} <br/>
	Mensagem: {$mensagem}
	</html>");	

$mail -> AltBody = "De:{$nome}\nEmail:{$email}\n{$Mensagem}";

if($mail -> send()){
	$_SESSION["sucess"] = "Menssagem Enviada com sucesso";
	header("Location: index.php");
} else{
	$_SESSION["danger"] = "Erro ao enviar".$mail->ErrorInfo;
	header("Location: contato.php");
}
die();