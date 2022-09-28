<?php



class Usuario_modelo{

    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $avatar;
    private $db;

    public function __construct(){

        $this->db = Database::connect();

    }

    public function save(){

        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', '{$this->getAvatar()}')";
        $save = $this->db->query($sql);

        $result = false;

        if($save){
            return $result = true;
        }else{
            return $result;
        }
    }
    

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     
     */ 
    public function setNombre($nombre)
    {   
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this->nombre;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $this->db->real_escape_string($apellido);

        return $this->apellido;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     
     */ 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this->email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     
     */ 
    public function setPassword($password)
    {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);

        return $this->password;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = addslashes($avatar);

        return $this->avatar;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
}