@extends('master')
@section('content')
<?php
use App\Models\RatingProduct;
use App\Models\CommentProduct;
// echo"<pre>";
//         print_r(Session::get('cart'));
//         echo"<pre>";
//         die();

// echo strlen('$2y$10$eTm.pk7zQyR0wXNbW/TVvO0K1Rwg60nQVnOcwbq0yeJ.Ym7v.fRQC');
// die();
?>
<!-- Column2 Section -->
        <div class="col2">
        	<div class="col2_top">&nbsp;</div>
            <div class="col2_center">
        	<h4 class="heading colr">Featured Products</h4>
            <div id="prod_scroller">
            <a href="javascript:void(null)" class="prev">&nbsp;</a>
       	  <div class="anyClass scrol">
                <ul>
                    @foreach($hot_products as $pr)
                    <li>
                    	<a href="{{route('product_detail',$pr->id)}}"><img src="asset/images/product/{{$pr['img_url']}}" alt="" ></a>
                        <h6 class="colr">{{$pr['name']}}</h6>
                        <p class="price bold">{{$pr['price'] / 1000000}} Tr</p>
                        <a href="{{route('add_to_cart',['id'=>$pr->id,'qty'=>1])}}" class="adcart">Add to Cart</a>
                    </li>
                    @endforeach
                </ul>
			</div>
            <a href="javascript:void(null)" class="next">&nbsp;</a>
        </div>
            <div class="clear"></div>
            <div class="listing">
            	<h4 class="heading colr">New Products for {{date('M Y')}}</h4>
                <ul>
                <?php $i = 1;?>
                    @foreach($new_products as $pr)

                        @if($i%4 == 0)
                        <li class="last">
						@else <li class="">
                        @endif
                        <?php $i ++;?>
                    	<a href="{{route('product_detail',$pr->id)}}" class="thumb"><img src="asset/images/product/{{$pr['img_url']}}" alt="" ></a>
                        <h6 class="colr">{{$pr['name']}}</h6>
                        <div class="stars">
                        <?php
                        $star = RatingProduct::where('id_product', $pr->id)->avg('star');
                        //echo (int)$star;
                        ?>
                        @for ($i = 0; $i < $star; $i++)
                        <a href="#"><img src="asset/images/star_green.gif" alt="" ></a>
                        @endfor
                        
                        	<!-- <a href="#"><img src="asset/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="asset/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="asset/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="asset/images/star_green.gif" alt="" ></a> -->
                            <a href="#"><img src="asset/images/star_grey.gif" alt="" ></a>
                            <?php
                                $comment = CommentProduct::where('id_product', $pr->id)->count('comment');
                            ?>
                            <a href="#">({{$comment}}) Reviews</a>
                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="cart.html" class="adcart">Add to Cart</a>
                            <p class="price">{{$pr['price'] / 1000000}} Tr</p>
                        </div>
                    </li>
                   @endforeach

                </ul>
            </div>
            </div>
            <div class="clear"></div>
            <div class="col2_botm">&nbsp;</div>
        </div>
@endsection