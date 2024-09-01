<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class PHPMailerController extends Controller
{
    // ========== [ Compose Email ] ================
    function sendEmail($output,$name,$email,$subject){
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);   // Passing `true` enables exceptions
        $mail->CharSet = 'UTF-8';
        try {
            $receiver = $email;
            $name = $name;
      
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'noreply@fressnel.mbsoftsolution.com';
            $mail->Password   = '9$!RibB@BrjKp.s@MBIT@MBIT';
            $mail->SMTPSecure = 'ssl'; // Change to 'tls' if your server supports it
            $mail->Port       = 465;   // Change to 587 if you're using 'tls'
            //Recipients
            $mail->From = 'noreply@fressnel.mbsoftsolution.com';
            $mail->setFrom('noreply@fressnel.mbsoftsolution.com', 'Next Millioner ');
            $mail->addAddress($receiver, $name);     //Add a recipient
      
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $output;
            $mail->send();
           
        } catch (Exception $e) {
            dd($mail->ErrorInfo);
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      }
  }


