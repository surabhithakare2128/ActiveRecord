<?php

include_once 'model.php';
//include 'collection.php';

class todo extends model {
	public $id;
        public $owneremail;
	public $ownerid;
	public $createddate;
	public $duedate;
	public $message;
	public $isdone;
	protected static $modelName = 'todo';
	public function getTableName(){
		$tableName = 'todos';
		return $tableName;
	}
}

?>
