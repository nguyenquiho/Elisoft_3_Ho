$( document ).ready(function() {   

    $('#btn-submit-form').click(function(){
        fullname = $('input[name ="fullname"]').val();
        username = $('input[name ="username"]').val();
        password = $('input[name ="password"]').val();
        repassword = $('input[name ="repassword"]').val();
        gender = $('input[name ="gender"]').val();
        avt = $('input[name ="avt"]').val();
        address = $('textarea[name ="address"]').val();
        if(fullname == '' || username == ''){
            $('#result-regis').text('Vui lòng điển đủ thông tin');
            return false;
        };
        if(password == ''){
            $('#result-regis').text('Vui lòng nhập mật khẩu');
            return false;
        };
        if(repassword != password){
            $('#result-regis').text('Mật khẩu không khớp nhau');
            return false;
        };
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
        if($('input[name ="agree"]').prop == 'false'){
            $('#result-regis').text('Phải click vào ô xác nhận điều khoản!');
            return false;
        }
        else{
            return true;
        }
    });
});