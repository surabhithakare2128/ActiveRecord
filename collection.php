<?php

include_once 'connectToDB.php';

class collection{
	static public function create(){
		$model= new static::$modelName;
		return $model;
	}
	static public function findAll() {
		$db = connectToDB::getConnect();
		$tableName = get_called_class();
		$sql = 'SELECT * FROM ' . $tableName;
		$statement = $db->prepare($sql);
		$statement->execute();
		$class = static::$modelName;
		$statement->setFetchMode(PDO::FETCH_CLASS, $class);
		$recordsSet =  $statement->fetchAll(PDO::FETCH_ASSOC);
		self::table($recordsSet, $tableName);
	}
	static public function findOne($id) {
		$db = connectToDB::getConnect();
        	$tableName = get_called_class();
		$sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
		$statement = $db->prepare($sql);
		$statement->execute();
		//$sql->exec();
		$class = static::$modelName;
		$statement->setFetchMode(PDO::FETCH_CLASS,$class);
		$recordsSet = $statement->fetchAll();
		self::table($recordsSet,$tableName);
	}
	static public function table($recordsSet, $tableName){
		$disp='';
		$disp.='<table border=4>';
		$database=connectToDB::getConnect();
		$sql1='show columns from ' .$tableName;
		$statement=$database->prepare($sql1);
		$statement->execute();
		$header=$statement->fetchAll(PDO::FETCH_COLUMN);
		foreach($header as $col){
                        $disp.="<td>$col</td>";
		}
		foreach($recordsSet as $row) {
			$disp.="<tr>";
			foreach($row as $col){
				$disp.="<td>$col</td>";
			}
			$disp.="</tr>";
		}
		$disp.="</table>";
		display::printThis($disp);
	}
}

?>
