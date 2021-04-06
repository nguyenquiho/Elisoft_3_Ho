<?php
    $_REQUEST['module'] = 'account';
    // print_r($user);
    // die();
?>
@extends('master')
@section('content')
<div class="col2_center">
                <h2 class="heading colr">Update info</h2>
                <div class="login">
                	<div class="registrd">
                    <form action="{{route('update_account')}}" method="post">
                    @csrf()
                    	<h3>Please input</h3>
                        <p class="error" align="center">@if(isset($msg)) {{$msg}} @endif</p>
                        <ul class="forms">
                        	<li class="txt">Fullname<span class="req"></span></li>
                            <li class="inputfield"><input type="text" name="fullname" class="bar" value="{{$user->name}}" >
                            </li>
                        </ul>
                        <ul class="forms">
                       	  <li class="txt" >Password<span class="req"></span></li>
                            <li class="inputfield"><input type="password" name="pass" class="bar" placeholder="Để trống nếu không muốn cập nhật" ></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Retype Pass<span class="req"></span></li>
                            <li class="inputfield"><input type="password" name="repass" class="bar" ></li>
                        </ul>
                      <ul class="forms">
                          <li class="txt">Mobile<span class="req"></span></li>
                          <li class="inputfield">
                            <input type="text" name="mobile" class="bar" value="{{$user->mobile}}">
                          </li>
                        </ul>
                      <ul class="forms">
                          <li class="txt">Gender<span class="req"></span></li>
                          <li>
                          		<label><input <?php  if ($user->gender == 1) echo 'checked' ?> name="gender" type="radio" value="1"> Nam </label>
                                <label><input <?php if($user->gender == 0) echo 'checked' ?> name="gender" type="radio" value="0"> Nữ </label>
                          </li>
                        </ul>
                      <ul class="forms">
                          <li class="txt">DOB<span class="req"></span></li>
                          <li class="inputfield">
                            <input name="dob" readonly type="text" class="bar" id="dob" value="<?=date('d-m-Y',strtotime($user->dob))?>">
                          </li>
                        </ul>
                        <ul class="forms">
                          <li class="txt">Address<span class="req"></span></li>
                          <li class="textfield">
                          	<textarea name="address"><?=$user->address?></textarea>
                          </li>
                        </ul>
                        <ul class="forms">
                       	  <li class="txt">&nbsp;</li>
                            <li><!--<a href="#" class="simplebtn"><span>Login</span></a> --><button type="submit">Update</button></li>
                        </ul>
                    
                    </form>
                  </div>
                </div>
                <div class="clear"></div>
            </div>
<link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
 <script>
  $( function() {
    $( "#dob" ).datepicker({
	  dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
	  yearRange:'-99:+0',
    });
  } );
  </script>

  @endsection