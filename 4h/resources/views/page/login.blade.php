@extends('master')
@section('content')
<div class="col3">
                <div class="col3_top">&nbsp;</div>
                <div class="col3_center">
                    <h2 class="heading colr">Login</h2>
                    <form method='post' action="{{route('login')}}">
                        <input type="hidden" name ='_token' value='{{csrf_token()}}'>
                        <div class="login">
                        <div class="registrd">
                            <h3>Please Sign In</h3>
                            <p>If you have an account with us, please log in.</p>
                            <ul class="forms">
                                <li class="txt">Email Address <span class="req">*</span></li>
                                <li class="inputfield"><input type="text" name="email" class="bar"></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Password <span class="req">*</span></li>
                                <li class="inputfield"><input type="password" name="password" class="bar"></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">&nbsp;</li>
                                <li><input type='submit' class="simplebtn" value='Login'><a href="#" class="forgot">Forgot Your Password?</a></li>
                            </ul>
                        </div>
                        <div class="newcus">
                            <h3>Please Sign In</h3>
                            <p>
                                By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                            </p>
                            <a href="{{route('signup')}}" class="simplebtn"><span>Register</span></a>
                        </div>
                    </div>
                    </form>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="col3_botm">&nbsp;</div>
            </div>
@endsection