<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;


use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

use App\Services\Mailer\MailOrder; 


class Order extends Model
{
    use HasFactory;
    protected $table = 'nn_order';

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createOrder($data){

        $cart = Session::get('cart');
        // print_r($cart->totalPrice);
        // die();
        $id = Auth::id();
        $order = new Order();
        $order->user_id = $id;
        $order->name = $data['name'];
        $order->email = $data['email'];
        $order->mobile = $data['mobile'];
        $order->address = $data['address'];
        $order->remark = $data['remark'];
        $order->ship_at = now();
        $order->total_price = $cart->totalPrice;
        $order->status = -1;
        $order->save();
        $order_id = $order->id;
        $orderedUser = User::find($id);
        $mail = new MailOrder();
        $mail->sendMail($orderedUser);

            
            foreach($cart->items as $item){
                $orderdetail = new OrderDetail();
                $orderdetail->order_id = $order_id;
                $orderdetail->product_id = $item['item']['id'];
                $orderdetail->qty = $item['qty'];
                $orderdetail->price = $item['price'];
                $orderdetail->save();
            }
            $oldCart = null;
            $cart = new Cart($oldCart);
            Session::put('cart',$cart);
            echo "<h2>Đặt hàng thành công! Hệ thống chuyển đến trang quản lý đơn hàng...</h2>";
            ?>
            <script>
            setTimeout("window.location='home';",3000);//Chuyen trang sau 3s
            </script>

        <?php }

    //}

}
