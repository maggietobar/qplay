<?php

require_once("userRepository.php");
require_once("usuario.php");

class UserJSONRepository extends UserRepository {

	public function existeElMail($mail)
	{
		$usuariosArray = $this->getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {

			if ($mail == $usuario->getMail())
			{
				return true;
			}
		}

		return false;
	}

	public function guardarUsuario(Usuario $miUsuario)
	{
		if ($miUsuario->getId() == null)
		{
			$miUsuario->setId($this->traerNuevoId());
		}

		if ($miUsuario->getIdPass()== null)
		{
            $miUsuario->setIdPass();
        }

		$miUsuarioArray = $this->usuarioToArray($miUsuario);
		$usuarioJSON = json_encode($miUsuarioArray);
		file_put_contents("usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
	}


	private function usuarioToArray(Usuario $miUsuario) {
		$usuarioArray = [];

		$usuarioArray["id"] = $miUsuario->getId();
		$usuarioArray["nombre"] = $miUsuario->getNombre();
		$usuarioArray["apellido"] = $miUsuario->getApellido();
		$usuarioArray["email"] = $miUsuario->getMail();
		$usuarioArray["password"] = $miUsuario->getPassword();
		$usuarioArray["fecha"] = $miUsuario->getFecha();
		$usuarioArray["bandas"] = $miUsuario->getBandas();
	    $usuarioArray["inst"] = $miUsuario->getInst();
	    $usuarioArray["nivelinst"] = $miUsuario->getNivelinst();
	    $usuarioArray["idPass"] = $miUsuario->getIdPass();

		


		return $usuarioArray;
	}

	private function arrayToUsuario(Array $miUsuario) {

	    $usuarioAux = $miUsuario;

	    $fecha = explode('-', $usuarioAux["fecha"]);
        $usuarioAux["dianac"] = $fecha[0];
        $usuarioAux["mesnac"] = $fecha[1];
        $usuarioAux["anionac"] = $fecha[2];

        return new Usuario($usuarioAux);
	}

	private function traerNuevoId()
	{
		if (!file_exists("usuarios.json"))
		{
			return 1;
		}

		$usuarios = file_get_contents("usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);
		$ultimoUsuario = $usuariosArray[count($usuariosArray) - 2 ];
		$ultimoUsuarioArray = json_decode($ultimoUsuario, true);

		return $ultimoUsuarioArray["id"] + 1;
	}


     /* se comento esta funcion ya que se crearon 2 funciones por separado
      * emailValido($mail) solo para validar el mail si es correcto
      * passValido($pass, $mail) solo para validar si la contraseña del usuario (email) es correcta
      * es para validar el Login por campo con los errores mas espesificos y aplicarle una correcta
      * y mas entendible estetica para una mejor interaccion con el usuario.
     
	public function usuarioValido($mail, $pass) {
		$usuario = $this->getUsuarioByMail($mail);

		if ($usuario) {
			if (password_verify($pass, $usuario->getPassword())) {
				return true;
			}
		}
		return false;
	}
	
	*/
	
	public function emailValido($mail) {
		$usuario = $this->getUsuarioByMail($mail);

		if ($usuario) {
			return true;
		}
		return false;
	}
	
    public function passValido($mail, $pass) {
		$usuario = $this->getUsuarioByMail($mail);
		if ($usuario) {
			if (password_verify($pass, $usuario->getPassword())) {
				return true;
			}
		}
		return false;
	}

	public function getUsuarioByMail($mail)
	{
		$usuariosArray = $this->getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {

			if ($mail == $usuario->getMail())
			{
				return $usuario;
			}
		}

		return null;
	}

	public function getUsuarioById($id)
	{
		$usuariosArray = $this->getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {

			if ($id == $usuario->getId())
			{
				return $usuario;
			}
		}

		return null;
	}

	public function getAllUsers()
	{
		$usuarios = file_get_contents("usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		array_pop($usuariosArray);

		return $this->muchosArraysAMuchosUsuarios($usuariosArray);
	}

	private function muchosArraysAMuchosUsuarios(Array $usuariosArray)
	{
		$usuarios = [];

		foreach ($usuariosArray as $usuarioArray) {
			$usuarios[] = $this->arrayToUsuario(json_decode($usuarioArray,1));
		}

		return $usuarios;
	}

}
