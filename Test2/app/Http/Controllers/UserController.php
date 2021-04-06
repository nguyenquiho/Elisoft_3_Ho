<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Services\Mailer\RegistrationMail;

use App\Models\User;

class UserController extends Controller
{
    public function getLogin(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        else{
            $_REQUEST['module'] = 'login';
            return view('page.login'); 
        }
    }
    public function postLogin(Request $req){
        // $user = User::find(114);

        // print_r($user);
        // die();
        $arr =[
            'email' => $req->email,
            'password' => $req->password
        ];

        if(Auth::attempt($arr)){
            //return view('page.login');
            return redirect()->route('home');
        }
        else redirect()->route('login');


    }

    public function getSignUp(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        else{
            $_REQUEST['module'] = 'signup';
            return view('page.signup');
        }
    }

    public function postSignUp(Request $req){
        if($req->isMethod('post')){
            $validator = Validator::make($req->all(),[
                'name'=>'required',
                'email'=>'required|min:6|max:30|unique:nn_user|email',
                'password'=>'required',
                'repassword'=>'required|same:password',
                'mobile'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            else{
                $user = new User();
                $user->name = $req->name;
                $user->email = $req->email;
                $user->password = Hash::make($req->password);
                $user->mobile = $req->mobile;
                $user->address = '';
                $user->save();

                $id = $user->id;
                $lastestUser = User::find($id);
                // dd($lastestUser);
                // die();
                $mail = new RegistrationMail();
                $mail->sendMail($lastestUser);
                
                return redirect()->back()
                ->with('success','Đăng ký thành công!');
            }
        }
        //return view('page.signup');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function getAccount(){
        $user = Auth::user();
        return view('page.account',compact('user'));
    }

    public function uploadAvt(){
            $id = Auth::id();
            $error=array(); // Khai báo mảng lỗi. để sau kiểm tra nếu mảng rỗng mới OK
            // Bước 1: tạo folder upload avetar để chứa ảnh
            $target_dir="asset/images/";
            $target_file= $target_dir.basename($_FILES['fileUpload']['name']); // Lấy target nối với tên file cần upload
            // Bước 2: Kiểm tra điều kiện file
            //echo $target_file;
            // 1: Ktra kích thước file
                if ($_FILES['fileUpload']['size']>5242880) {
                $error['fileUpload']="Chỉ được upload file dưới 5MB !";
            }
            // 2: Kiểm tra đuôi(loại) file (png ,jpeg,jpg,gif)
            $file_type=pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);// Lấy đuôi file
            // echo $file_type;
            $file_type_allow= array('png','jpg','jpeg','gif'); //Lưu đuôi file cho phép upload vào 1 mảng để ktra
                if (!in_array(strtolower($file_type), $file_type_allow)) {// Kiểm tra đuôi file có là 1 trong số dạng file cho phép hay k,( tham số T!: đuôi file upload------- Tham số T2: Mảng cho phép)
                $error['fileUpload']='Chỉ cho phép upload file ảnh!';
            }
            
            // 3: Kiểm tra sự tồn tại của file
                if (file_exists($target_file)) {
                $error['fileUpload']="File đã tồn tại!";
            }

            // Bước 3: Kiểm tra và chuyển file từ bộ nhớ tạm lên SEVER
                if (empty($error)) {
                if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)) {
                        
                        $flag=true;
                    }
            }	else echo "<span style='color:red'>".$error['fileUpload']."</span>";

            if (isset($flag)) {// Nếu upload thành công
            // echo $target_file;
            // echo $user;
            $user = User::find($id);
            $user->avt = $target_file;
            $user->save();
            echo "<span style='color:#3270d3'> Upload thành công!</span>";
        }

    }


    public function getUpdateAccount(){
        $id = Auth::id();
        $user = User::find($id);
        return view('page.update_account',compact('user'));
    }
    public function updateAccount(Request $req){
        // dd($req);
        // die();
        $msg = '';
        if($req->fullname != null || $req->pass != null || $req->repass != null)
        {
            // die();
            $fullname= $req->fullname;
            $pass= $req->pass;
            $repass=$req->repass;
            $mobile= $req->mobile;
            $gender= $req->gender;
            $dob= $req->dob;
            //Chuyen format tu dd-mm-yyyy => yyyy-mm-dd
            $dob = date('Y-m-d',strtotime($dob));
            $address= $req->address;
            
            if($fullname=='')
                $msg = 'Bạn phải nhập name';
            else if(strlen($pass) > 0 && strlen($pass) < 8 )
                $msg = 'Pass>8 ky tu';
            else if($pass!=$repass)
                $msg = 'Pass nhap lai khong dung';
            else //Tat ca du lieu hop de => update DB
            {
                $id = Auth::id();
                $obj_user = User::find($id);
                if($pass != '')//Neu co thay doi password
                {
                    $obj_user->password = Hash::make($pass);
                    $obj_user->save();
                }
                else
                {
                    $obj_user->name = $fullname;
                    $obj_user->mobile = $mobile;
                    $obj_user->gender = $gender;
                    $obj_user->dob = $dob;
                    $obj_user->address = $address;
                    $obj_user->save();
                    $msg = 'Cập nhật thành công!';
                }
            }
            
        }

        return redirect()->back()->with('msg',$msg);
    }
}
