<?php
namespace App\Services\Mailer;
use Mail;
use Illuminate\Support\Facades\Session;

use App\Services\Mailer\MailInterface;

class MailOrder implements MailInterface{
    function sendMail($to){
        $cart = session('cart')?Session::get('cart'):null;
        if($cart != null){
                Mail::send('mails.ordered', ['items'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty], function ($m) use ($to) {
                    $m->from('quyhonguyen@gmail.com', 'Élishop');
                    if($_REQUEST){
                        $m->to($_REQUEST['email'], $_REQUEST['name'])->subject('Create account success');
                    }else{
                        $m->to($to->email, $to->name)->subject('Create account success');
                    }
                });

        }
    }
}

?>