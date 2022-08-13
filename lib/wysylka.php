<?php
require_once './vendor/autoload.php';
require_once 'stalemail.php';

class Wysylka {
    private $user;
    private $password;
    private $smtp;
    private $port;
    private $nazwawystawcy;

    function __construct(){
        $stalemail = new StaleMail();
        $this->setUser($stalemail->user);
        $this->setPassword($stalemail->password);
        $this->setSmtp($stalemail->smtp);
        $this->setPort($stalemail->port);
        $this->setNazwawystawcy($stalemail->nazwawystawcy);
    }

    public function mail($tytul, $tresc, $email, $kto){
        $transport = (new Swift_SmtpTransport($this->getSmtp(), $this->getPort(), 'ssl'))
                        ->setUsername($this->getUser())
                        ->setPassword($this->getPassword());
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message($tytul))
        ->setFrom([$this->getUser() => $this->getNazwawystawcy()])
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

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of smtp
     */
    public function getSmtp()
    {
        return $this->smtp;
    }

    /**
     * Set the value of smtp
     *
     * @return  self
     */
    public function setSmtp($smtp)
    {
        $this->smtp = $smtp;

        return $this;
    }

    /**
     * Get the value of port
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set the value of port
     *
     * @return  self
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get the value of nazwawystawcy
     */
    public function getNazwawystawcy()
    {
        return $this->nazwawystawcy;
    }

    /**
     * Set the value of nazwawystawcy
     *
     * @return  self
     */
    public function setNazwawystawcy($nazwawystawcy)
    {
        $this->nazwawystawcy = $nazwawystawcy;

        return $this;
    }
}


