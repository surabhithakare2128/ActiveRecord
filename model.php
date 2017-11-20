<?php

include_once 'connectToDB.php';

class model {
	protected $tableName;
        
	public function save(){
		if ($this->id == '')
		{
			$this-> insert();
	        } 
		else{
			$this->update($this->id);
		}
	}
	public function insert(){
		$db= connectToDB::getConnect();
		$mn=static::$modelName;
		//echo $mn;
        	$tableName = $mn::getTableName();
		$this->id='';
	        $array = get_object_vars($this);
		array_pop($array);
		$column = array_keys($array);
		$columnString=implode(',', $column);
		$valueString = "'".implode("',' ", $array)."'";
		$sql =  'INSERT INTO ' . $tableName. '  VALUES ('.$valueString. ')';
		//$db = connectToDB::getConnect();
		$statement = $db->prepare($sql);
		$statement->execute();

		$disp='';
		//echo "ONE RECORD INSERTED";
		//display::printThis($disp);
	}

	public function update($id){
		//$sql = 'sometthing';
		//return $sql;
		//echo 'I just updated record' . $this->id;
		$mn=static::$modelName;
		$tableName = $mn::getTableName();
		$array = get_object_vars($this);
		array_pop($array);
		$temp=' ';
		$array1='';
		foreach($array as $key=>$value){
			$array1.=$temp.$key.'="'.$value.'"';
			$temp=", ";
		}
		$sql= 'update '.$tableName.' SET'.$array1.' where id='.$this->id;
	        $db = connectToDB::getConnect();
		$statement = $db->prepare($sql);
		$statement->execute();
		$disp='';
		//echo "<br>ONE RECORD UPDATED<br> ";
		//display::printThis($disp);
	}
	
	public function delete(){
		$db= connectToDB::getConnect();
		$mn=static::$modelName;
		/*if($mn == 'account'){
			$tableName= 'accounts';
		}else{
			$tablename= 'todos';
		}*/
		$tableName= $mn::getTableName();
		//echo $tableName;
		
		$db= connectToDB::getConnect();
		$sql = 'delete from ' .$tableName. '  where id='.$this->id;
		$statement = $db->prepare($sql);
		$statement->execute();
		$disp='';
		$disp='<br>RECORD DELETED WITH ID= ' .$this->id;
		display::printThis($disp);
        }
}

?>
