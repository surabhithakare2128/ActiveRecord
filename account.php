<?php

include_once 'model.php';
//include 'collection.php';

class account extends model {
	public $id;
        public $email;
	public $fname;
	public $lname;
	public $phone;
	public $birthday;
	public $gender;
	public $password;
	protected static $modelName = 'account';
	public function getTableName(){
		$tableName = 'accounts';
		return $tableName;
	}
}

?>
