<?php
    require_once 'PHPMailer';
    require_once 'classes/PHPMailerAdapter.php';

    $mail = new PHPMailerAdapter;

    $mail->setUseSmtp();
    $mail->setSmtpHost('smtp.gmail.com', 465);
    $mail->setSmtpUser('emersonco30@gmail.com', 'minhasenha');
    $mail->setFrom('emersonco30@gmail.com', 'Emerson Silva');
    $mail->addAddress('destinatario@gmail.com','destinatario');
    $mail->setSubject('oi cara');
    $mail->setHtmlBody('<b>Isso é um <i>teste</i></b>');
    $mail->send();
    