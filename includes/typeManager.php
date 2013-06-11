<?php

//THIS MAY OR MAY NOT BE CORRECT AS A CLASS MANAGER. LOLZ

include_once('db.php');
include_once('products.php');
include_once('type.php');


class Type_Manager{

	public function getAllTypes(){

		$connection = new Database();
		$query = "SELECT typeid FROM tbtype";

		$result = $connection->query($query);

		$type_array = array();

		while($row = $connection->fetch_array($result)){
			$type = new Type();
			$type->load($row["typeid"]);
			$type_array[] = $type; //Add subject objects to the end of the array


		}//while

		$connection->close_connection();

		return $type_array;

		

	}//getAllSubjects

}//class

 ?>