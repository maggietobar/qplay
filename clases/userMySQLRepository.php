<?php

require_once("userRepository.php");
require_once("usuario.php");

class UserMySQLRepository extends UserRepository {

	private $miConexion;

	public function __construct($miConexion)
	{
		$this->miConexion = $miConexion;
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

	public function existeElMail($mail)
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuarios where email = :mail");

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
				$stmt = $this->miConexion->prepare("Update usuarios set nombre = :nombre, apellido = :apellido, email = :mail, password = :password, fechanac = :fechanac, idpass = :idpass WHERE id = :id");
			}
			else
			{
				$stmt = $this->miConexion->prepare("INSERT INTO usuarios (id, nombre, apellido, email, password, fechanac, idpass) values (:id, :nombre, :apellido, :mail, :password, :fechanac, :idpass)");
			}


			$stmt->bindValue(":id", $miUsuario->getId());

		}
		else
		{
			$stmt = $this->miConexion->prepare("INSERT INTO usuarios (nombre, apellido, email,password, fechanac, idpass) values (:nombre, :apellido, :mail, :password, :fechanac, :idpass)");
		}

		$stmt->bindValue(":nombre", $miUsuario->getNombre());
		$stmt->bindValue(":apellido", $miUsuario->getApellido());
		$stmt->bindValue(":password", $miUsuario->getPassword());
		$stmt->bindValue(":mail", $miUsuario->getMail());
		$stmt->bindValue(":fechanac", $miUsuario->getFecha());
		$stmt->bindValue(":idpass", $miUsuario->getIdPass());

       $stmt->execute();


        if ($miUsuario->getId() == null)
        {
            $miUsuario->setId($this->miConexion->lastInsertId());
        }

        $this->insertarBandas($miUsuario);
        $this->insertarInstrumentos($miUsuario);

	}

	private function arrayToUsuario(Array $miUsuario) {
	    $miUsuario['bandas'] = $this->getBandasbyIdUsuario($miUsuario['id']);
        $miUsuario['inst'] = $this->getInstrumentosbyIdUsuario($miUsuario['id']);
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
		$stmt = $this->miConexion->prepare("SELECT * from usuarios where email = :mail");

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
		$stmt = $this->miConexion->prepare("SELECT * from usuarios where id = :id");

		$stmt->bindValue(":id", $id);

		$stmt->execute();

		$usuarioArray = $stmt->fetch();

		if ($usuarioArray == false)
		{
			return null;
		}

		return $this->arrayToUsuario($usuarioArray);
	}

	public function emailValido($mail) {
        $usuario = $this->getUsuarioByMail($mail);

        if ($usuario) {
            return true;
        }
        return false;
    }

	public function getAllUsers()
	{
		$stmt = $this->miConexion->prepare("SELECT * from usuarios");

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

public function insertarBandas (Usuario $miUsuario){

    $bandas = $miUsuario->getBandas();

    if ($bandas){
        foreach ($bandas as $banda) {

            $stmt = $this->miConexion->prepare("INSERT INTO bandas (id_usuario, banda) values ( :id_usuario, :banda)");

            $stmt->bindValue(":id_usuario", $miUsuario->getId());
            $stmt->bindValue(":banda", $banda);
            $stmt->execute();
        }

    }
}

public function insertarInstrumentos (Usuario $miUsuario){
    $instrumentos = $miUsuario->getInst();



    foreach ($instrumentos as $instrumento => $nivel){

        $stmt = $this->miConexion->prepare("INSERT INTO instrumentos (id_usuario, instrumento, nivel) values (:id_usuario, :instrumento, :nivel)");

        $stmt->bindValue(":id_usuario", $miUsuario->getId());
        $stmt->bindValue(":instrumento", $instrumento);
        $stmt->bindValue(":nivel", $nivel);
        $stmt->execute();
    }

}

public function getBandasbyIdUsuario ($id){
    $stmt = $this->miConexion->prepare("SELECT banda from bandas WHERE id_usuario = :id");
    $stmt->bindValue(":id" , $id);
    $stmt->execute();
    $resultados = $stmt->fetchAll();

    foreach($resultados as $linea){
        $bandasArray[] = $linea['banda'];
    }

    return $bandasArray;
}

public function getInstrumentosbyIdUsuario($id){
    $stmt = $this->miConexion->prepare("SELECT * from instrumentos WHERE id_usuario = :id");
    $stmt->bindValue(":id" , $id);
    $stmt->execute();
    $resultados = $stmt->fetchAll();


    foreach($resultados as $linea){
        $instrumentosArray[$linea['instrumento']] = $linea['nivel'];
    }

    return $instrumentosArray;
}

}