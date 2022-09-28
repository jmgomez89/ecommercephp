<?php

require_once 'models/usuario.php';
require_once 'helpers/utilities.php';

class Usuario{

    public function index(){

        echo 'controlador usuarios, action index';

    }

    public function register(){

        require_once $_SERVER['DOCUMENT_ROOT'].'../views/layout/signin.php';

    }

    public function login(){

        require_once $_SERVER['DOCUMENT_ROOT'].'../views/layout/login.php';
        
    }

    public function log(){

        if(isset($_POST)){
            
        }
        
    }

    public function save(){

        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $avatar = isset($_POST['avatar']) ? $_POST['avatar'] : false;
            $errores = array();

            if(!$nombre){
                $errores['nombre'] = "Tu nombre es requerido";
            }else{
                $nombre = Utilities::test_input($nombre);
            }

            if(!$apellido){
                $errores['apellido'] = "Tu apellido es requerido";
            }else{
                $apellido = Utilities::test_input($apellido);
            }

            if(!$email){
                $errores['email'] = "Tu email es requerido";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errores['email'] = "El mail no es válido";
            }else{
                $email = Utilities::test_input($email);
                if (!$email = Utilities::chequeo_mail($email)) {
                    $errores['email'] = "El mail ya está registrado";
                  }
            }

            if(!$password){
                $errores['password'] = "Una contraseña es requerida";
            }elseif(!$password = Utilities::chequeo_password($password)){
                $errores['password'] = "La contraseña no es válida, ingrese una nueva";
            }else{
                $password = Utilities::test_input($password);
            }
                
            
            if(count($errores) == 0){

                $usuario = new Usuario_modelo();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $usuario->setAvatar($avatar);
                $save = $usuario->save();
    
                if($save){
                    echo "<h3 style='text-align: center;'>Usuario cargado con éxito</h3>";
                
                }else{
                    echo "<h3 style='text-align: center; color: red'>No fue posible cargar el usuario</h3>";
                }

            }else{
                $_SESSION['errores_registro'] = $errores;
                foreach ($errores as $value) {
                    echo "<h4 style='text-align: center;'>{$value}</h4>";
                }
                
                echo "<a href='?controller=usuario&action=register' style='display: block; text-align: center;'>Volver</a>";
            }
        }

    }
}



