<?php

class Usuario {

	private $id;
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $fecha;
	private $bandas = [];
	private $inst = [];
    private $idPass;

	public function __construct(Array $miUsuario)
	{
		$this->nombre = $miUsuario["nombre"];
		$this->apellido = $miUsuario["apellido"];
		$this->email = $miUsuario["email"];
		$this->password = $miUsuario["password"];
		$this->fecha = $miUsuario["dianac"]."-".$miUsuario["mesnac"]."-".$miUsuario["anionac"];
		$this->bandas = $miUsuario["bandas"];
        $this->setIdPass();

        if(array_key_exists('register', $miUsuario)){
            for ($i = 0; $i < count($miUsuario['inst']); $i++){
                $this->inst[$miUsuario['inst'][$i]] =  $miUsuario['nivelinst'][$i];
            }
        }else{
            $this->inst = $miUsuario['inst'];
        }

	}

	public function getNombre() {
		return $this->nombre;
	}
	public function getApellido() {
		return $this->apellido;
	}
	public function getId() {
		return $this->id;
	}
	public function getMail() {
		return $this->email;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getFecha() {
		return $this->fecha;
	}
	public function getBandas() {
		return $this->bandas;
	}
	public function getInst() {
		return $this->inst;
	}
	public function getIdPass(){
	    return $this->idPass;
    }

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}
	public function setMail($email)
	{
		$this->email = $email;
	}
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setIdPass(){
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $this->idPass = '';
        for ($i = 0; $i < 15; $i++) {
            $this->idPass .= $characters[rand(0, $charactersLength - 1)];
        }
    }

/* public function guardarImagen()
	{
		if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK)
		{
			// No hubo errores :)
			$path = $_FILES['imagen']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);

			$miArchivo = dirname(__FILE__);
			$miArchivo = $miArchivo . "/img/";
			$miArchivo = $miArchivo . $this->getId() . "." . $ext;

			move_uploaded_file($_FILES["imagen"]["tmp_name"], $miArchivo);
		}
	} */
}
