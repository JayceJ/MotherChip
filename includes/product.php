<?php

include_once('wrapper.php');


class Product{

	private $product_id;
	private $product_name;
	private $description;
	private $price;
	private $type_id;
	private $stock_level;
	private $photo_path;
	private $active;

	public function __construct(){

		$this->product_id = 0;
		$this->product_name = '';
		$this->description = '';
		$this->price = 0;
		$this->type_id = 0;
		$this->stock_level = 0;
		$this->photo_path = '';
		$this->active = 0;

	}


	//This function will load a page from db to php
	//precondition: subjectID to load must exist
	public function load($product){

		$connection = new Database();

		$query = '
			SELECT productid, productname, description, price, typeid, stocklevel, photopath, active
			FROM tbproduct
			WHERE productid =' . $product;

		$result = $connection->query($query);

		//Fetch result out as array
		$product_array = $connection->fetch_array($result);

		//Assign array values to object attributes
		$this->product_id = $product_array["productid"];
		$this->product_name = $product_array["productname"];
		$this->description = $product_array["description"];
		$this->price = $product_array["price"];
		$this->type_id = $product_array["typeid"];
		$this->stock_level = $product_array["stocklevel"];
		$this->photo_path = $product_array["photopath"];
		$this->active = $product_array["active"];		

	}

	public function save(){

		$connection = new Database();

		$query = '
			INSERT INTO tbproduct (
				productname, 
				description, 
				price, 
				typeid, 
				stocklevel, 
				photopath, 
				active
			)
			VALUES (
				"'.$this->product_name.'",
				"'.$this->description.'",
				"'.$this->price.'",
				"'.$this->type_id.'",
				"'.$this->stock_level.'",
				"'.$this->photo_path.'",
				"'.$this->active.'"
			)
		';

		$result = $connection->query($query);

	}

	public function __get($property){

		switch ($property) {
			case 'ID':
				return $this->product_id;
				break;

			case 'productName':
				return $this->product_name;
				break;
			
			case 'description':
				return $this->description;
				break;
			
			case 'price':
				return $this->price;
				break;
			
			case 'typeID':
				return $this->type_id;
				break;

			case 'stockLevel':
				return $this->stock_level;
				break;
				
			case 'photoPath':
				return $this->photo_path;
				break;
				
			case 'active':
				return $this->active;
				break;
			
			default:
				die("Sorry, <b>". $property . "</b> is not allowed to be read from");
		}

	}// get

	public function __set($property, $value){

		switch($property){

			case 'productName';
				$this->product_name = $value;
				return;
			case 'description';
				$this->description = $value;
				return;
			case 'price';
				$this->price = $value;
				return;
			case 'typeID';
				$this->type_id = $value;
				return;
			case 'stockLevel';
				$this->stock_level = $value;
				return;
			case 'photoPath';
				$this->photo_path = $value;
				return;
			case 'active';
				$this->active = $value;
				return;
			default:
				die("Sorry, <b>". $property . "</b> is not allowed to be written to");

		}

	}// set





}


/////////////////TESTING////////////////////

// $test = new Product();

// $test->load(1);
// print_r($test);

	




 ?>