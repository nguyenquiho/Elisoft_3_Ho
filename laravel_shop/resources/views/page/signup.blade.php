@extends('master')
@section('content')
<div class="col3">
<div class="col3_top">&nbsp;</div>
<div class="col3_center">
<h2 class="heading colr">Sign up</h2>

<div class="login">
    <div class="registrd">
    <div class="notice" style='text-align:center;color:red;'>
    @if($errors->has('name'))
    {{$errors->first('name')}}
    @endif
    @if($errors->has('email'))
    {{$errors->first('email')}}
    @endif
    @if($errors->has('password'))
    {{$errors->first('password')}}
    @endif
    @if($errors->has('repassword'))
    {{$errors->first('repassword')}}
    @endif
    @if($errors->has('phone'))
    {{$errors->first('phone')}}
    @endif
    </div>
    
    <div class="notice" style='text-align:center;color:red;'>
    @if(Session::has('success'))
    {{Session::get('success')}}
    @endif
    </div>
    	<form action="{{route('postsignup')}}" method="post" >
            @csrf
    	  <p class="error"><?php //$msg?></p>
         <ul class="forms">
            <li class="txt">Full name <span class="req">*</span></li>
            <li class="inputfield"><input name="name" type="text" class="bar" id="name" value="<?php //if(!empty($name)) //echo $name; ?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Email Address <span class="req">*</span></li>
            <li class="inputfield"><input name="email" pattern="[a-z0-9._-]{2,}@[a-z0-9.-]{1,}\.[a-z]{2,}" type="text" class="bar" id="email" value="<?php //if(!empty($email)) echo $email; ?>" title="Email không hợp lệ" required></li>
        </ul>
        <ul class="forms">
            <li class="txt">Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="password" class="bar" id="pass" ></li>
        </ul>
         <ul class="forms">
            <li class="txt">Confirm Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="repassword" class="bar" id="repass" ></li>
        </ul>
         <ul class="forms">
            <li class="txt">Mobile <span class="req">*</span></li>
            <li class="inputfield"><input type="text" name="mobile" class="bar" id="mobile" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            	<button type="submit">Sign up</button>
                <!--<a class="simplebtn"><span>Login</span></a>-->
                <a href="#" class="forgot">Forgot Your Password?</a></li>
        </ul>
        </form>
    </div>
</div>
<div class="clear"></div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="col3_botm">&nbsp;</div>
            </div>
@endsection