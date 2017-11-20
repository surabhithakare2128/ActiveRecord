<?php

class connectToDB{
	protected static $db;
	public function __construct(){
		try{
			self::$db=new PDO('mysql:host=sql2.njit.edu;dbname=st638','st638','adhere54');
			self::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			//echo 'Connected successfully. <br>';
		}catch(PDOException $e){
		       	echo 'connection failed: ' . $e-> getMessage() . '<br>';
		}
	}

	public static function getConnect(){
		if(!self::$db){
			new connectToDB();
		}
		return self::$db;
	}
}

/*
$database=connectToDB::getConnect();
//print_r($database);
echo '<br>';
*/
?>
