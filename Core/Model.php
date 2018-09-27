<?php

namespace Core;
use PDO;

abstract class Model{

	protected $attributes;

	public function __construct($data){


		$this->attributes = [];

		foreach ($data as $key => $value) {

			$this->attributes[] = [$key => $value];
		}

	}

	public static  function getDB(){

		static $db = NULL;

		if ($db === NULL){

			$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
			return $db;			
		}else{
			echo 'Already Connected';
		}


	}

	public function getAll(){


		$table = self::getTable();
		$query = 'SELECT * FROM '.$table.'';

		$db = self::getDB();


		$stmt = $db->query($query);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}


	public function save(){

		$sqlfields = $this->getFields();
		$sqlfieldsbind = $this->getFieldsBind();
		$table = self::getTable();
				
		$sql = 'INSERT INTO '.$table.' ('.$sqlfields.') VALUES ('.$sqlfieldsbind.')';


		$db = self::getDB();
		$stmt = $db->prepare($sql);




		foreach ($this->attributes as $value) {
			foreach ($value as $key => $valuefinal) {

				if($key != 'passwordconfirm'){
					$stmt->bindValue(':'.$key.'',$valuefinal,PDO::PARAM_STR);						
				}

			}
		}

		$stmt->execute();

	}

	public function update() {
		

	}


	private static function getTable(){
		$child = get_called_class();
		$table = $child::$table;

		return $table;
	}


	private function getFields($data = []){

		$sqlFields = null;


		foreach ($this->attributes as $value) {

			foreach ($value as $key => $value) {

				$sqlFields = $sqlFields.$key.',';
			}
		}

		return rtrim($sqlFields,','); //Removes last comma
	}


	private function getFieldsBind(){

		$sqlFields = null;

		foreach ($this->attributes as $value) {

			foreach ($value as $key => $value) {

				$sqlFields = $sqlFields.':'.$key.',';
			}
			
		}

		return rtrim($sqlFields,','); //Removes last comma
	}

}