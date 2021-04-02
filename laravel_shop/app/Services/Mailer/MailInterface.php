<?php
namespace App\Services\Mailer;

interface MailInterface{
    function sendMail($to);
}
?>