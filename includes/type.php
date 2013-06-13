<?php

include_once('wrapper.php');
include_once('product.php');


class Type{

	private $type_id;
	private $type_name;
	private $description;
	private $display_order;
	private $products;

	public function __construct(){

		$this->type_id = 0;
		$this->type_name = "";
		$this->description = "";
		$this->display_order = 0;
		$this->products = array();

	}

	public function load($type){

		$connection = new Database();

		$query = '
			SELECT typeid, typename, description, displayorder
			FROM tbproducttype
			WHERE typeid =' . $type;

		$result = $connection->query($query);

		$type_array = $connection->fetch_array($result);

		//Assign array values to object attributes
		$this->type_id = $type_array["typeid"];
		$this->type_name = $type_array["typename"];
		$this->description = $type_array["description"];
		$this->display_order = $type_array["displayorder"];

		//Load all pages under the products
		$query = " SELECT productid
					FROM tbproduct 
					WHERE typeid = ".$type;
		$result = $connection->query($query);

		while($row = $connection->fetch_array($result)){
			//For each pageID under the subject, create a page object
			
			$product = new Product();
			$product->load($row["productid"]);
			$this->products[] = $product; //Add pages objects into the array

		}

	
		$connection->close_connection(); 

	}

	public function __get($property){

		switch($property){

			case 'ID';
				return $this->type_id;
				break;
			case 'typeName';
				return $this->type_name;
				break;
			case 'description';
				return $this->description;
				break;
			case 'display_order';
				return $this->display_order;
				break;
			case 'products';
				return $this->products;
				break;
			default:
				die("Sorry, <b>". $property . "</b> is not allowed to be read from");

		}

	}
}


/////////////////TESTING////////////////////

// $test = new Type();

// $test->load(1);
// echo "<pre>";
// print_r($test);
// echo "</pre>";

 ?>