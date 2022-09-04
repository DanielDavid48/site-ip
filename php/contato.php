<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('class.phpmailer.php');
    $nome = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $numero = strip_tags(trim($_POST["phone"]));
    $subject = "Contato pelo site";
    $message = strip_tags(trim($_POST["message"]));
    $assunto = 'Contato feito pelo site...';
    $mensagem = 'Visitante: ' .$nome. + " - TEL-CEL: " +" '.$numero.'" + " \r\n".
                'Email: ' .$email. "\r\n". 
                'Assunto: ' .$subject. "\r\n". 
                'Mensagem: ' .$message;
    /* $destino = $_POST['txtdest'];
    $assunto = $_POST['txtass'];
    $mensagem = $_POST['txtmsg']; */
    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->SMTPDebug = 1;
    $mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails
    $mailer->Host = 'smtp-relay.sendinblue.com'; //smtp.dominio.com.br
    $mailer->SMTPAuth = true; //define se haverá ou não autenticação no SMTP
    $mailer->Username = 'danielfernandolucianodavid48@gmail.com'; //Informe o e-mai o completo
    $mailer->Password = 'XML3Ppr9atzYOdTx'; //Senha da caixa postal
    $mailer->FromName = 'Site ipagenciadigital.tk'; //Nome que será exibido para o destinatário
    $mailer->From = 'contato@ipagenciadigital.tk'; //Obrigatório ser a mesma caixa postal indicada em "username"
    $mailer->AddAddress('ipagenciadigital.br@gmail.com','Daniel David'); //Destinatários
    $mailer->Subject = $assunto;
    $mailer->Body = $mensagem;
    
    if($mailer->Send()){
        echo "<script type='text/javascript'>window.location='../windows/obrigado.html'; </script>";
    } else {
        echo "<script type='text/javascript'>window.location='../windows/naoenviou.html'; </script>";
    }
}

?>