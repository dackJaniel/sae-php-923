<?php

use Error;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // Server settings
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = MAIL_HOST;
        $this->mail->Port = MAIL_PORT;
        $this->mail->Username = MAIL_USERNAME;
        $this->mail->Password = MAIL_PASSWORD;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $this->mail->CharSet = MAIL_CHARSET;
        $this->mail->Encoding = MAIL_ENCODING;

        $this->mail->isHTML(true);

        $this->mail->setFrom('info@useless.de', 'UseLess');
        $this->mail->addReplyTo('sae@danielhilmer.de', 'UseLess Info');
    }

    public function sendMail(array $recipients, string $subject, string $body)
    {
        // Recipients
        foreach ($recipients as $recipient) {
            $this->mail->addAddress($recipient);
        }

        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        try {
            $this->mail->send();
        } catch (Exception $e) {
            throw new Error("Beim Senden der E-Mail ist ein Fehler aufgetreten: {$this->mail->ErrorInfo}");
        }
    }
}