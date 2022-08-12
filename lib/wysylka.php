<?php

use PharIo\Manifest\Email;

error_reporting(0);

require_once './vendor/autoload.php';
require_once 'stale.php';

class Wysylka {

    public function mail($tytul, $tresc, $email, $kto){
        $stale = new Stale;
        $transport = (new Swift_SmtpTransport($stale->smtp, $stale->port, 'ssl'))
                        ->setUsername($stale->user)
                        ->setPassword($stale->password);
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message($tytul))
        ->setFrom([$stale->user => $stale->nazwawystawcy])
        ->setTo([$email, $email => $kto])
        ->setBody($tresc)
        ;
        try {
            $result = $mailer->send($message);
        }
        catch (Exception $e) {
            $result = -1;
        }

    }
}


