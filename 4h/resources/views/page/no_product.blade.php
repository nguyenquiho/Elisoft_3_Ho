@extends('master')
@section('content')
<?php
    // foreach($product_detail as $k=>$v){
    //     echo $k.'----'.$v.'<br>';
    // }
    // print_r($product_detail['desc']);
    // die();
?>
<div class="col2">
<br>
<br>
<h2>Không có sản phẩm
thuộc loại {{$cat_name}}</h2>
</div> 
@endsection