<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//require_once $_SERVER['DOCUMENT_ROOT'] . '/blackkack/black-jack-site/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$message_text = $_POST['message_text'];
$value = $_POST['value'];

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

// Informando para usar SMTP
$mail->isSMTP();

/*
  Habilitando debug SMTP
  0 = off (uso em producao)
  1 = Mensagens ao Cliente
  2 = Mensagens ao Cliente e Servidor
*/

$mail->SMTPDebug = 0;

/*
  Definir o nome do servidor de e-mail
  use $mail ->HOST = gethostbyname('email.gmail.com');
  se sua rede n�o suportar SMTP over Ipv6
*/

$mail->Host = 'smtp.gmail.com';

/*
  Defina o numero da porta SMTP - 587 para autenticacao TLS,
  a.k.a. RFC4409 SMTP submission
*/

$mail->Port = 587;

// Define o sistema de criptografia a usar- ssl (depreciado) ou tals
$mail->SMTPSecure = 'tls';

// Se vai usar SMTP authentication
$mail->SMTPAuth = true;

// Usu�rio para usar SMTP authentication
// Use o endere�o completodo e-mail do Gmail
$mail->Username = 'ricardopeleira16@gmail.com'; // SMTP username from https://mailgun.com/cp/domains

$mail->Password = 'npgnxhymkcxeoobc'; // SMTP password from https://mailgun.com/cp/domains

// Definir o remetente
$mail->setFrom('ricardopeleira16@gmail.com', 'Curso');

// Definir o endereço para respostas
$mail->addReplyTo('ricardopeleira16@gmail.com', 'Curso');

// Definir destinatario
$mail->addAddress($email, 'Destinatário');

// Definir o Assunto
$mail->Subject = 'Teste PHPMailer';

// Definir formato de mensagem HTML
$mail->isHTML(true);

// Corpo da Mensagem
$mail->Body = '<div style=\'width:95%; margin-left:2.5%;\'>
<h4>Foram pedidas as seguintes informações (pt-PT):</h4>
<hr><b> Nome :</b> '.$nome.'<br /><br />
<b> Email:</b> '.$email.'<br /><br/>
<b> Telefone/Telemovel:</b> '.$telefone.'<br /><br/>
<b> Mensagem:</b> '.$message_text.'<br /><hr>
</div>';

// Corpo alternativo caso email n�o suporte html
$mail->AltBody = 'Mensangem simples';

$merge = array();

// Envia a mensagem e verifica os erros
if (!$mail->send()) {
    $error = "Erro ao enviar o endereco de email <b>".$email."</b> as informacoes do formulario contactos";
    $test = "";

} else {
    $test = 'Sucesso ao enviar as informações do contacto no email <b>'.$email.'</b>. Vai receber as informacoes do contacto no email <b>'.$email.'</b>';
    $error = "";
}
$merge = array_merge($merge, ['msg' => $test, 'error' => $error]);
echo json_encode($merge, JSON_UNESCAPED_UNICODE);




?>