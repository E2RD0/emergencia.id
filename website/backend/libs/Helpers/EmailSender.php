<?php
namespace Helpers;

class EmailSender
{
    public static function sendEmail($subject, $to, $message)
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("e2rd0e@gmail.com", "Emergencia.id");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $message);
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            return($response->statusCode()==200 || $response->statusCode()==202);
        } catch (Exception $e) {
            return false;
        }
    }
}
