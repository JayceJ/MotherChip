<?php

//THIS MAY OR MAY NOT BE CORRECT AS A CLASS MANAGER. LOLZ

include_once('wrapper.php');
include_once('type.php');
include_once('product.php');


class Type_Manager{

	//No attributes

	public function load_all_types(){

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



//TESTING
// $test = new Type_Manager();

// $all_types = $test->load_one_type(1);

// echo '<pre>';
// print_r($all_types);
// echo '</pre>';

 ?>