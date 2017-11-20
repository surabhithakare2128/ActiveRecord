<?php

include 'table.php'; 
include 'accounts.php';
include_once 'todos.php';
include 'todo.php';
include 'account.php';
include_once  'model.php';

ini_set('display_errors', 'On');

error_reporting(E_ALL);

class Manage {
	public static function autoload($class) {
		include $class . '.php';
	}
}

spl_autoload_register(array('Manage', 'autoload'));
					
$obj = new main();

class main{
	public function __construct(){
		$disp='';
		echo '<h1>ACCOUNTS TABLE</h1><br>';
		echo 'ALL RECORDS OF ACCOUNTS';
		display::printThis($disp);
		accounts::findAll();
		display::printThis($disp);
		echo "<hr>";

		echo '<br><br>ONE RECORD OF ACCOUNTS';
		display::printThis($disp);
		$id=4;
		accounts::findOne($id);
		display::printThis($disp);
        	echo "<hr>";

		$disp = 'INSERTING A NEW RECORD';
		display::printThis($disp);
		$record = new account();
		$record->id='';
		$record->email='abc@gmail.com';
		$record->fname='john';
		$record->lname='thakare';
		$record->phone='987-654-3210';
		$record->birthday='1995-08-28';
		$record->gender='female';
		$record->password='123';
		$record->save();
		echo 'TABLE AFTER ADDING NEW RECORD <br>';	
		accounts::findAll();
		$disp='<br>';
		display::printThis($disp);
        	echo "<hr>";

		echo 'UPDATING RECORD IN ACCOUNTS';
		$record=new account();
		$record->id=1;
		$record->email='st64@njit.com';
 		$record->fname='hike';
         	$record->lname='luther';
	        $record->phone='111-323-3116';
		$record->birthday='1946-07-01';
		$record->gender='male';
		$record->password='5643';
		$record->save();
		$disp= 'After update.<br>';
		display::printThis($disp);
		accounts::findOne($id);
		$disp= '<br>';
		display::printThis($disp);
       		echo "<hr>";


		$display='';
		$display= '<h3>DELETING FROM ACCOUNTS<br>';
		display::printThis($display);
		$record=new account();
		$record->id=45;
		$record->delete();
		echo 'AFTER DELETING<br>';
		accounts::findAll();
        	echo "<hr>";

        echo '<h1>TODO TABLE</h1><br>';
        echo 'ALL RECORD0S OF TODOS';
        display::printThis($disp);
        todos::findAll();
        display::printThis($disp);
        echo "<hr>";

        echo '<br><br>ONE RECORD OF TODOS';
        display::printThis($disp);
        $id=4;
        todos::findOne($id);
        display::printThis($disp);
        echo "<hr>";
	
	echo 'INSERTING A NEW RECORD INTO TODOS';
        display::printThis($disp);
        $record = new todo();
        $record->id='';
        $record->owneremail='fgdsgs';
        $record->ownerid='8';
        $record->createddate='2217-43-23 00:00:00';
        $record->duedate='4755-23-23 00:00:00';
        $record->message='fi';
        $record->isdone='0';
        $record->save();
        echo 'TABLE AFTER ADDING NEW RECORD <br>';
        todos::findAll();
        display::printThis($disp);
        echo "<hr>";

 	echo 'DELETING FROM TODOS<br>';
        display::printThis($disp);
	$record=new todo();
	$record->id=8;
	$record->delete();
	echo '<br>AFTER DELETING<br>';
	todos::findAll();
	display::printThis($disp);
	echo "<hr>";


        echo 'UPDATING RECORD IN TODOS<br>';
        $record=new todo();
        $record->id='';
        $record->owneremail='st64@njit.com';
        $record->ownerid='';
	$record->createddate='';
	$record->duedate='';
	$record->message='Hi';
	$record->isdone='1';
        $record->save();
        todos::findOne($id);
        display::printThis($disp);
        echo "<hr>";
	
	}
}

?>
