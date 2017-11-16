<?php

class connect{
	protected static $database;
	public function __construct(){
		try{
			self::$database=new PDO('mysql:host=sql2.njit.edu;dbname=st638','st638','adhere54');
			self::$database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			echo 'Connected successfully. <br>';
		}catch(PDOException $e){
		       	echo 'connection failed: ' . $e-> getMessage() . '<br>';
		}
	}

	public static function getConnect(){
		if(!self::$database){
			new connect();
		}
		return self::$database;
	}
}

$database=connect::getConnect();
//print_r($database);
echo '<br>';

?>
