<?php

require_once("repository.php");
require_once("userMySQLRepository.php");

class MySQLRepository extends Repository {
	private $userRepository;
	private $connection;

	public function __construct() {
		$this->connection = new PDO('mysql:host=localhost;dbname=qplay', "root", "");
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