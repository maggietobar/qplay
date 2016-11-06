<?php

require_once("repository.php");
require_once("userMySQLRepository.php");

class MySQLRepository extends Repository {
	private $userRepository;
	private $connection;

	public function __construct() {
		$this->connection = new PDO('mysql:host=localhost;dbname=miSistema', "root", "");
		// Acá deberíamos tener el user y pass en un archivo de texto QUE NO SE VERSIONA, NO SE SUBE A NINGUN LADO Y NADIE TIENE
	}

	public function getUserRepository()
	{
		if ($this->userRepository == null)
		{
			$this->userRepository = new UserMySQLRepository($this->connection);
		}

		return $this->userRepository;
	}
	
	public function startTransaction()
	{
		$this->connection->beginTransaction();
	}

	public function commitTransaction()
	{
		$this->connection->commit();
	}

	public function rollBack() 
	{
		$this->connection->rollBack();
	}
}