<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mailer {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.hostinger.com'; // Your SMTP server
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'no-reply@apexholdco.com'; // Your email
        $this->mail->Password = '$Apexholdco2026'; // Your email password
        $this->mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $this->mail->Port = 587; // TCP port to connect
    }

    public function sendEmail($to, $subject, $body) {
        try {
            // Recipients
            $this->mail->setFrom('no-reply@apexholdco.com', 'Apex Hold Company');
            $this->mail->addAddress($to);

            // Email content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->AltBody = strip_tags($body); // Plain text for non-HTML clients

            // Send the email
            $this->mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return false; // Failed to send email
        }
    }
}
?>
