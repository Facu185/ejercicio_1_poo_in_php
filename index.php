<?php 
    abstract class Usuario{
        protected $name;
        protected $email;
        protected $contraseña;

        public function __construct($name,$email,$contraseña){
            $this->name = $name;
            $this->email = $email;
            $this->contraseña = $contraseña;
        }

        abstract public function mostrarPerfil();

    }
    
    interface PuedeEditar {
        public function editarContenido();
    }

    class Cliente extends Usuario{ 
        protected $saldo;
         public function __construct($name,$email,$contraseña,$saldo){
            $this->saldo = $saldo;
            parent::__construct($name,$email,$contraseña);
        }
        public function mostrarPerfil(){
           return "Cliente: ". "<br>" ."Nombre: ".$this->name . "<br>" . "Email: ".$this->email . "<br>" . "Contraseña: ".$this->contraseña . "<br>" ."Saldo: ".$this->saldo. "<br>";
        }

    }

    class Administrador extends Usuario{ 
        protected $permisos;
         public function __construct($name,$email,$contraseña,$permisos){
            $this->permisos = $permisos;
            parent::__construct($name,$email,$contraseña);
        }
        public function mostrarPerfil(){
           return  "Administrador: "."<br>" ."Nombre: ".$this->name . "<br>" . "Email: ".$this->email . "<br>" . "Contraseña: ".$this->contraseña .  "<br>" . "Permisos: ".$this->permisos."<br>";
        }
        public function editarContenido(){
            echo("Editando el contenido");
        }
    }
    $Cliente= new Cliente("Facundo","facu@gmail.com","1234","1");
    echo $Cliente->mostrarPerfil();
    $Administrador= new Administrador("Facundo","facu@admin.com","1234","superAdmin");
    echo $Administrador->mostrarPerfil();
    echo $Administrador->editarContenido();
?>