<?php

class Session{
    public static function init(){
        if(version_compare(phpversion(),'5.4.0','<')){
            if(session_id() ==  ''){
                session_start();
            }
        }else{
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
        }
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else return false;
    }

    public static function check_session(){
        self::init();
        if(self::get('login') == false){
            self::destroy();
            header("Location:index.php?mod=login");
        }
    }

    public static function check_login(){
        self::init();
        if(self::get('name') == true){
            //return true;
            self::destroy();
            header("Location:index.php?mod=home");
        }
        else return false;
    }

    public static function unset($key){
        unset($_SESSION[$key]);
        header("Location:index.php?mod=home");
    }
    
    public static function destroy(){
        session_destroy();
        header("Location:index.php?mod=home");
    }

    public static function add_to_cart($id,$qty){
            if(isset($_SESSION['cart']))
            $cart = $_SESSION['cart'];
            else{
                $cart = array();
            }
                $cart[$id] = $cart[$id] + $qty;

            
            $_SESSION['cart'] = $cart;
            return $cart;  
    }

    public static function delete_from_cart($id){
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }
        
        if(isset($cart[$id])){
            unset($cart[$id]);
        }
        $_SESSION['cart'] = $cart;
        return $cart;
    }

    public static function update_cart(){
        if(isset($_POST) && isset($_SESSION['cart'])){
            foreach($_POST as $k=>$v){
                $cart[$k] = $v;
            }
                
        }
        $_SESSION['cart'] = $cart;
        return $cart;
    }
}

?>