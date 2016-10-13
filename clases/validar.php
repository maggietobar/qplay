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

    public function validarUsuario($miUsuario)
    {
        $errores = [];

        if (trim($miUsuario["nombre"]) == "")
        {
            $errores[] = "Falta el nombre";
        }
        if (trim($miUsuario["apellido"]) == "")
        {
            $errores[] = "Falta el apellido";
        }
        if ($miUsuario["email"] == "")
        {
            $errores[] = "Falta el mail";
        }

        if (trim($miUsuario["password"]) == "")
        {
            $errores[] = "Falta la pass";
        }
        if (trim($miUsuario["password2"]) == "")
        {
            $errores[] = "Falta confirmar su contraseña";
        }
        if ($miUsuario["password"] != $miUsuario["password2"])
        {
            $errores[] = "Pass y Cpass son distintas";
        }

        if (!filter_var($miUsuario["email"], FILTER_VALIDATE_EMAIL))
        {
            $errores[] = "El mail tiene forma fea";
            unset($_POST['email']);
        }
        if ($this->userRepository->existeElMail($miUsuario["email"]))
        {
            $errores[] = "Usuario ya registrado";
            unset($_POST['email']);
        }
        return $errores;
    }

    function validarLogin()
    {
        $errores = [];

        if (trim($_POST["mail"]) == "") {
            $errores[] = "No pusiste email";
        } else if (!$this->userRepository->existeElMail($_POST["mail"])) {
            $errores[] = "El mail no existe";
        } else if (!$this->userRepository->usuarioValido($_POST["mail"], $_POST["password"])) {
            $errores [] = "El usuario no es valido";
        }

        if (trim($_POST["password"]) == "") {
            $errores[] = "No pusiste contrase&ntilde;a";
        }

        return $errores;
    }
}
