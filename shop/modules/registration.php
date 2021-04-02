<div class="col3_center">
                <h2 class="heading colr">Registration</h2>
                <h4 class="notice-regis" style="color:red;padding:10px"></h4>
                <div class="login">
                	<div class="registrd">
                        <form action="#" method = "post" id="form-regis">
                            <h3>Please Registration</h3>
                            <p>If you don't have an account with us, please Registration.</p>
                            <ul class="forms">
                                <li class="txt">Email Address <span class="req">*</span></li>
                                <li class="inputfield"><input type="text" name="email" class="bar" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Password <span class="req">*</span></li>
                                <li class="inputfield"><input type="password" name="password" class="bar" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Retype Password <span class="req">*</span></li>
                                <li class="inputfield"><input type="password" name="repassword" class="bar" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Name <span class="req">*</span></li>
                                <li class="inputfield"><input type="text" name="name" class="bar" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Mobile <span class="req">*</span></li>
                                <li class="inputfield"><input type="text" name="mobile" class="bar" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Address <span class="req">*</span></li>
                                <li class="inputfield"><textarea name="address" id="" cols="30" rows="10" name="address" class="bar" ></textarea></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Date of Birth <span class="req">*</span></li>
                                <li class="inputfield">
                                <select class="" name="date">
                                    <option value="1" selected = 'true'>Ngày 1</option>
                                    <option value="2">Ngày 2</option>
                                    <option value="3">Ngày 3</option>
                                    <option value="4">Ngày 4</option>
                                    <option value="5">Ngày 5</option>
                                    <option value="6">Ngày 6</option>
                                    <option value="7">Ngày 7</option>
                                    <option value="8">Ngày 8</option>
                                    <option value="9">Ngày 9</option>
                                    <option value="10">Ngày 10</option>
                                    <option value="11">Ngày 11</option>
                                    <option value="12">Ngày 12</option>
                                    <option value="13">Ngày 13</option>
                                    <option value="14">Ngày 14</option>
                                    <option value="15">Ngày 15</option>
                                    <option value="16">Ngày 16</option>
                                    <option value="17">Ngày 17</option>
                                    <option value="18">Ngày 18</option>
                                    <option value="19">Ngày 19</option>
                                    <option value="20">Ngày 20</option>
                                    <option value="21">Ngày 21</option>
                                    <option value="22">Ngày 22</option>
                                    <option value="23">Ngày 23</option>
                                    <option value="24">Ngày 24</option>
                                    <option value="25">Ngày 25</option>
                                    <option value="26">Ngày 26</option>
                                    <option value="27">Ngày 27</option>
                                    <option value="28">Ngày 28</option>
                                    <option value="29">Ngày 29</option>
                                    <option value="30">Ngày 30</option>
                                    <option value="31">Ngày 31</option>
                                    </select>

                                    <select class="" name="month">
                                    <option value="1" selected='true'>Tháng 1</option>
                                    <option value="2">Tháng 2</option>
                                    <option value="3">Tháng 3</option>
                                    <option value="4">Tháng 4</option>
                                    <option value="5">Tháng 5</option>
                                    <option value="6">Tháng 6</option>
                                    <option value="7">Tháng 7</option>
                                    <option value="8">Tháng 8</option>
                                    <option value="9">Tháng 9</option>
                                    <option value="10">Tháng 10</option>
                                    <option value="11">Tháng 11</option>
                                    <option value="12">Tháng 12</option>
                                    </select>

                                    <select class="" name="year">
                                    <option value="2001" selected='true'>Năm 2001</option>
                                    <option value="2002">Năm 2002</option>
                                    <option value="2003">Năm 2003</option>
                                    <option value="2004">Năm 2004</option>
                                    <option value="2005">Năm 2005</option>
                                    <option value="2006">Năm 2006</option>
                                    </select>
                                </li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Gender <span class="req">*</span></li>
                                <li class="">
                                    <input type="radio" name="gender" value="1" checked='checked'> <label for="male">Male</label>&nbsp;
                                    <input type="radio" name="gender" value="0"> <label for="fermale">Fermale</label><br><br>
                                </li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">&nbsp;</li>
                                <li><button id ="btn-regis" type="submit" class="simplebtn" name ="registration"><span>Registration</span></button> <a href="#" class="forgot">Forgot Your Password?</a></li>
                            </ul>
                        </form>
                    	
                    </div>
                    <div class="newcus">
                    	<h3>Please Sign In</h3>
                        <p>
                        	By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                        </p>
                        <a href="index.php?module=login" class="simplebtn"><span>Login</span></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

        
        <script>
            $( document ).ready(function() {
            $('#btn-regis').click(function(){
                // get values form fields
                var email = $('input[name ="email"]').val();
                var name = $('input[name ="name"]').val();
                var password = $('input[name ="password"]').val();
                var repassword = $('input[name ="repassword"]').val();
                var dtDay= $('select[name ="date"]').val();
                var dtMonth = $('select[name ="month"]').val();
                var dtYear = $('select[name ="year"]').val();
                var gender = $('input[name ="gender"]').val();
                var address = $('textarea[name ="address"]').val();
                var mobile = $('input[name ="mobile"]').val();
                
                console.log(email);
                console.log(email);
                console.log(password);
                console.log(repassword);
                console.log(dtDay);
                console.log(dtMonth);
                console.log(dtYear);
                console.log(gender);
                console.log(address);
                
                // Check fullname and username
                var fail = 0;
                if(name == '' || email == '' || password == '' || repassword == '' || address == '' || address == undefined){
                    $('.notice-regis').text('Vui lòng điển đủ thông tin!');
                    return false;
                };

                // Check password
                if(password == ''){
                    $('.notice-regis').text('Vui lòng nhập mật khẩu!');
                    return false;
                }

                if(password.length < 6){
                    $('.notice-regis').text('Mật khẩu ít nhất 6 ký tự!');
                    return false;
                }
                if(repassword != password){
                    $('.notice-regis').text('Mật khẩu không khớp nhau!');
                    return false;
                }
                if(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/.test(password) == false){
                    $('.notice-regis').text('Mật khẩu bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt!');
                    return false
                }
                // Check date month
                if (dtMonth < 1 || dtMonth > 12){
                    $('.notice-regis').text('Tháng không hợp lệ!');
                    return false;
                }
                else if (dtDay < 1 || dtDay> 31){
                    $('.notice-regis').text('Ngày không hợp lệ!');
                    return false;
                } 
                else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31){
                    $('.notice-regis').text('Tháng có 30 ngày!');
                    return false;
                }
                else if (dtMonth == 2)
                {
                var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
                if (dtDay> 29 || (dtDay ==29 && !isleap)){
                    $('.notice-regis').text('Ngày không hợp lê!');
                    return false;
                }
                }

                if(gender == ''||gender == null){
                    $('.notice-regis').text('Chọn giới tính');
                    return false;
                };
                
                //check address min 10 character
                if(address.length < 10){
                    $('.notice-regis').text('Địa chỉ dài hơn 10 kí tự!');
                    return false;
                }

                $.ajax({
				method: "POST",
				url: "models/Queries.php",
				data: $("#form-regis").serialize(),
				success : function(response){
					$('.notice-regis').html(response);
                    //alert(response);
                    //return true;
				}
			    });

                // $('#result-regis').html('<span style="color:green">Đăng kí thành công!</span>');
                // alert("Đăng ký thành công");
                
            });
        });
        </script>