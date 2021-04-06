<?php
namespace App\Services\Mailer;

use App\Services\Mailer\MailInterface;
use Mail;

class RegistrationMail implements MailInterface{
    function sendMail($data){
        Mail::send('mails.registration', ['data' => $data], function ($m) use ($data) {
            $m->from('quyhonguyen@gmail.com', 'Élishop');
            $m->to($data->email, $data->name)->subject('Create account success');
        });
    }
}
?>