$( document ).ready(function() {
    var agree = $('input[name ="agree"]').val();
    $('input[name ="agree"]').change(function(){
        if(agree == 'on'){
            agree = 'off';
        }
        else{
            agree = 'on';
        }
    });
    $('#btn-submit-form').click(function(){

        // get values form fields
        var fullname = $('input[name ="fullname"]').val();
        var username = $('input[name ="username"]').val();
        var password = $('input[name ="password"]').val();
        var repassword = $('input[name ="repassword"]').val();
        var dtDay= $('select[name ="date"]').val();
        var dtMonth = $('select[name ="month"]').val();
        var dtYear = $('select[name ="year"]').val();
        var gender = $('input[name ="gender"]').val();
        var avt = $('input[name ="avt"]').val();
        var address = $('textarea[name ="address"]').val();

        // Check fullname and username
        if(fullname == '' || username == ''){
            $('#result-regis').text('Vui lòng điển đủ thông tin!');
            return false;
        };

        // Check password
        if(password == ''){
            $('#result-regis').text('Vui lòng nhập mật khẩu!');
            return false;
        }

        if(password.length < 6){
            $('#result-regis').text('Mật khẩu ít nhất 6 ký tự!');
            return false;
        }
        if(repassword != password){
            $('#result-regis').text('Mật khẩu không khớp nhau!');
            return false;
        }
        if(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/.test(password) == false){
            $('#result-regis').text('Mật khẩu bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt!');
            return false
        }
        // Check date month
        if (dtMonth < 1 || dtMonth > 12){
            $('#result-regis').text('Tháng không hợp lệ!');
            return false;
        }
        else if (dtDay < 1 || dtDay> 31){
            $('#result-regis').text('Ngày không hợp lệ!');
            return false;
        } 
        else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31){
            $('#result-regis').text('Tháng có 30 ngày!');
            return false;
        }
        else if (dtMonth == 2)
        {
           var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
           if (dtDay> 29 || (dtDay ==29 && !isleap)){
            $('#result-regis').text('Ngày không hợp lê!');
            return false;
           }
        }

        if(gender == ''||gender == null){
            $('#result-regis').text('Chọn giới tính');
            return false;
        };
        

        //check img 
            switch(avt.substring(avt.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png':
                    break;
                default:
                    $(this).val('');
                    // error message here
                    $('#result-regis').text('Vui lòng chọn hình ảnh dúng định dạng!');
                    return false;
            }

        //check address min 10 character
        if(address.length < 10){
            $('#result-regis').text('Địa chỉ dài hơn 10 kí tự!');
            return false;
        }

        //check checked agree
        if(agree == 'off'){
            $('#result-regis').text('Phải click vào ô xác nhận điều khoản!');
            return false;
        }
        else{
            // $('#result-regis').html('<span style="color:green">Đăng kí thành công!</span>');
            alert("Đăng ký thành công");
            return true;
        }
    });
});