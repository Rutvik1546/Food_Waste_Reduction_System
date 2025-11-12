<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../mailer/src/PHPMailer.php';
require_once __DIR__ . '/../mailer/src/SMTP.php';
require_once __DIR__ . '/../mailer/src/Exception.php';

class Mailer {
    public static function send($to, $subject, $body) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'rutvikmistry8642@gmail.com'; 
            $mail->Password   = 'aftefafrwyykgwxf'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('rutvikmistry8642@gmail.com', 'Food Waste Reduction System');
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            return $mail->send();
        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            return false;
        }
    }
}
