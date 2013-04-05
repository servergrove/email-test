<?php

require __DIR__. '/vendor/swiftmailer/swiftmailer/lib/swift_required.php';

$from = 'my@email.com';
$to = 'user@example.com';

$smtpUser = $from;
$smtpPassword = 'MySecurePassword';

$smtpHost = 'localhost';
//$smtpHost = 'mail.servergrove.com';

$transport = 'smtp';
//$transport = 'sendmail';
//$transport = 'mail';


switch($transport) {
    case 'smtp':
        $transport = \Swift_SmtpTransport::newInstance($smtpHost, 25)
          ->setUsername($smtpUser)
          ->setPassword($smtpPassword)
          ;
        break;
    case 'sendmail':
        $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');
        break;
    case 'mail':
        $transport = Swift_MailTransport::newInstance();
        break;
    default:
        die("Invalid transport $transport");
        break;
}

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Test message')
  ->setFrom(array($from))
  ->setTo(array($to))
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);

var_dump($result);