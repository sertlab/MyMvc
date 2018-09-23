<?php

namespace Core;
use PDO;

abstract class Model{

	protected $dbh;
	protected $stmt;



	public function __construct(){

		if($this->dbh == NULL){
			$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		}
	}

	public  function getAll(){


		$query = 'SELECT * FROM '.$this->table.'';


		$this->stmt = $this->dbh->query($query);
		$results = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}


	public function create(){

	}

	public function update() {
		
	}

}