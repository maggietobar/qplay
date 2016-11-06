<?php

require_once("userRepository.php");
require_once("usuario.php");

class UserMySQLRepository extends UserRepository {

	private $miConexion;

	public function __construct($miConexion)
	{
		$this->miConexion = $miConexion;
	}

	public function existeElMail($mail)
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuario where mail = :mail");

		$stmt->bindValue(":mail", $mail);

		$stmt->execute();

		if ($stmt->rowCount() == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function guardarUsuario(Usuario $miUsuario)
	{
		if ($miUsuario->getId())
		{
			if ($this->getUsuarioById($miUsuario->getId()))
			{
				$stmt = $this->miConexion->prepare("Update usuario set nombre = :nombre, apellido = :apellido, mail = :mail, sexo = :sexo, password = :password WHERE id = :id");
			}
			else
			{
				$stmt = $this->miConexion->prepare("INSERT INTO usuario (id, nombre, apellido, sexo, password, mail) values (:id, :nombre, :apellido, :sexo, :password, :mail)");
			}


			$stmt->bindValue(":id", $miUsuario->getId());

		}
		else
		{
			$stmt = $this->miConexion->prepare("INSERT INTO usuario (nombre, apellido, sexo, password, mail) values (:nombre, :apellido, :sexo, :password, :mail)");
		}

		$stmt->bindValue(":nombre", $miUsuario->getNombre());
		$stmt->bindValue(":apellido", $miUsuario->getApellido());
		$stmt->bindValue(":sexo", $miUsuario->getSexo());
		$stmt->bindValue(":password", $miUsuario->getPassword());
		$stmt->bindValue(":mail", $miUsuario->getMail());
        insertarBandas($miUsuario);
        insertarInstrumentos($miUsuario);
		$stmt->execute();

		if ($miUsuario->getId() == null)
		{
			$miUsuario->setId($this->miConexion->lastInsertId());
		}
	}


	private function arrayToUsuario(Array $miUsuario) {
		return new Usuario($miUsuario);
	}

	public function usuarioValido($mail, $pass)
	{
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
		$stmt = $this->miConexion->prepare("SELECT * from usuario where mail = :mail");

		$stmt->bindValue(":mail", $mail);

		$stmt->execute();

		$usuarioArray = $stmt->fetch();

		if ($usuarioArray == false)
		{
			return null;
		}

		return $this->arrayToUsuario($usuarioArray);
	}

	public function getUsuarioById($id)
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuario where id = :id");

		$stmt->bindValue(":id", $id);

		$stmt->execute();

		$usuarioArray = $stmt->fetch();

		if ($usuarioArray == false)
		{
			return null;
		}

		return $this->arrayToUsuario($usuarioArray);
	}

	public function getAllUsers()
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuario");

		$stmt->execute();

		$usuariosArray = $stmt->fetchAll();

		return $this->muchosArraysAMuchosUsuarios($usuariosArray);
	}

	private function muchosArraysAMuchosUsuarios(Array $usuariosArray)
	{
		$usuarios = [];

		foreach ($usuariosArray as $usuarioArray) {
			$usuarios[] = $this->arrayToUsuario($usuarioArray);
		}

		return $usuarios;
	}

private function insertarBandas (Usuario $miUsuario){

    $bandas = $miUsuario->getBandas();

    if ($bandas){
        foreach ($bandas as $banda) {

            $stmt = $this->miConexion->prepare("INSERT INTO bandas (id, id_usuario, banda) values (:id, :id_usuario, :banda)");

            $stmt->bindValue(":id", $this->miConexion->lastInsertId());
            $stmt->bindValue(":id_usuario", $miUsuario->getId());
            $stmt->bindValue(":banda", $banda);
        }

        $stmt->execute();
    }
}

private function insertarInstrumentos (Usuario $miUsuario){
    $instrumentos = $miUsuario->getInst();
    $niveles = $miUsuario->getNivelinst();

    for ($i = 0; $i < count($instrumentos); $i++){
        $stmt = $this->miConexion->prepare("INSERT INTO instrumentos (id, id_usuario, instrumento, nivel) values (:id, :id_usuario, :banda)");

        $stmt->bindValue(":id", $this->miConexion->lastInsertId());
        $stmt->bindValue(":id_usuario", $miUsuario->getId());
        $stmt->bindValue(":instrumento", $instrumentos[$i]);

        switch ($niveles[$i]){
            case 0: $nivel = "Principiante"; break;
            case 1: $nivel = "Intermedio"; break;
            case 2: $nivel = "Avanzado"; break;
            case 3: $nivel = "Experto"; break;
        }
        $stmt->bindValue(":nivel", $nivel);
    }

    $stmt->execute();
};