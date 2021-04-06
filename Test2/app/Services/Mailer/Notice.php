<?php
namespace App\Services\Mailer;

use App\Services\Mailer\MailInterface;
use Mail;

class Notice implements MailInterface{
    function sendMail($data){
        Mail::send('mails.registration', ['data' => $data], function ($m) use ($data) {
            foreach($data as $d){
                $m->from('quyhonguyen@gmail.com', 'Élishop');
                $m->to($d->email, $d->name)->subject('HOT: Siêu khuyến mãi Elishop');
            }
        });
    }

}

?>