<?php
namespace App\Models;

use Core\Model;
use PDO;

class User extends Model {

	public static $table = 'users';
	public $errors;


	public function validate($post) {

		if($post['username'] == "") {
			$this->errors[] = 'User Name Required';
		}

		if($this->emailExists($post['email'])) {
			$this->errors[] = 'This User Already exists';
		}

		if(filter_var($post['email'], FILTER_VALIDATE_EMAIL) === false ){
			$this->errors[] = 'Invalid e-mail'; 
		}

		if($post['password'] != $post['passwordconfirm']) {
			$this->errors[] = 'Password must mach confirmation';
		}

		if(strlen($post['password']) < 6 ){
			$this->errors[] = 'Password needs at least 6 letters';
		}

		// if(preg_match('/.*[a-z]+.*/i',$post['password']) === 0 ){
		// 	$this->errors[] = 'Password Needs at least one letter';
		// }

		// if(preg_match('/.*d+.*/i',$post['password']) === 0 ){
		// 	$this->errors[] = 'Password Needs at least one number';
		// }
	}


	public function emailExists($email) {
		$sql = 'SELECT * FROM users WHERE email = :email';

		$db = static::getDB();

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch() !== false;
	}


}