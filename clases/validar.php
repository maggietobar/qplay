<?php

require_once("userRepository.php");

class Validar {

    private $userRepository;
	private static $instance = null;

	public static function getInstance(UserRepository $userRepository)
    {
        if (Validar::$instance === null) {
            Validar::$instance = new Validar();
            Validar::$instance->setUserRepository($userRepository);
        }

        return Validar::$instance;
    }

    private function setUserRepository(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

	private function __construct() {

	}

    public function validarUsuario($miUsuario)  {
        
        $errores = [];

        if (trim($miUsuario["nombre"]) == "")
        {
            $errores[] = "<b>ERROR!</b> El campo Nombre no puede estar vacio.";
        }
        if (trim($miUsuario["apellido"]) == "")
        {
            $errores[] = "<b>ERROR!</b> El campo Apellido no puede estar vacio.";
        }
        if ($miUsuario["email"] == "")
        {
            $errores[] = "<b>ERROR!</b> El campo Email no puede estar vacio.";
        }

        if (trim($miUsuario["password"]) == "")
        {
            $errores[] = "<b>ERROR!</b> El campo Contraseña no puede estar vacio.";
        }
        if (trim($miUsuario["password2"]) == "")
        {
            $errores[] = "<b>ERROR!</b> Tiene que confirmar su contraseña.";
        }
        if ($miUsuario["password"] != $miUsuario["password2"])
        {
            $errores[] = "<b>ERROR!</b> La contraseña y su confimacion no pueden ser distintas.";
        }

        if (!filter_var($miUsuario["email"], FILTER_VALIDATE_EMAIL))
        {
            $errores[] = "<b>ERROR!</b> El Email ingresado no es valido.";
            unset($_POST['email']);
        }
        if ($this->userRepository->existeElMail($miUsuario["email"]))
        {
            $errores[] = "<b>ERROR!</b> El Email ya pertenece a un usuario registrado.";
            unset($_POST['email']);
        }
        return $errores;
    }

    function validarLogin() {
        
        $errores = [];
        $passreg = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";

        if (trim($_POST["mail"]) == "") {
            $errores["mail"] = "<b>ERROR!</b> El campo Email no puede estar vacio.";
        } else if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {    
            $errores["mail"] = "<b>ERROR!</b> El Email ingresado no es valido.";
        } else if (!$this->userRepository->existeElMail($_POST["mail"])) {
            $errores["mail"] = "<b>ERROR!</b> El Email ingresado no pertenece a una cuenta registrada.";
        } else if (!$this->userRepository->emailValido($_POST["mail"])) {
            $errores ["mail"] = "<b>ERROR!</b> El Email es incorrecto.";
        }

        if (trim($_POST["pass"]) == "") {
            $errores["pass"] = "<b>ERROR!</b> El campo Contrase&ntilde;a no puede estar vacio.";
        } else if (strlen($_POST["pass"]) < 8) {
            $errores["pass"] = "<b>ERROR!</b> La Contraseña tiene que tener minimo 8 caracteres.";
        } else if (!preg_match($passreg, $_POST["pass"])) {
            $errores["pass"] = "<b>ERROR!</b> La Contraseña tiene que tener al menos una letra minúscula, una mayúscula y un numero.";
        } else if (!$this->userRepository->passValido($_POST["mail"], $_POST["pass"])) {
            $errores ["pass"] = "<b>ERROR!</b> La Contraseña es incorrecta.";
        }
        
        return $errores;
    }
}
