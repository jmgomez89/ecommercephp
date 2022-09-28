<?php

class Utilities{

    public static function deleteSession($nombre){
        if(isset($_SESSION[$nombre])){
            unset($_SESSION[$nombre]);
        }
        
        return $nombre;
    }

    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function chequeo_mail($email){
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = Database::connect();
        $check = $login->query($sql);
        if($check && mysqli_num_rows($check) > 0){
           return false;
        }else{
            return true;
        };
    
    }

    public static function chequeo_password($password){
        $sql = "SELECT * FROM usuarios WHERE password = '$password'";
        $login = Database::connect();
        $check = $login->query($sql);
        if($check && mysqli_num_rows($check) > 0){
           return false;
        }else{
            return true;
        };
    
    }

}