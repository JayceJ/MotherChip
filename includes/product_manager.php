<?php 
include_once('wrapper.php');
include_once('type.php');
include_once('product.php');


class Product_Manager{


	public function load_all_products(){

		$connection = new Database();

		$query = '
			SELECT productid
			FROM tbproduct
		';

		$result = $connection->query($query);

		$products_array = array();

		while($row = $connection->fetch_array($result)){

			$product = new Product();

			$product->load($row['productid']);

			$products_array[] = $product;

		}


		$connection->close_connection();

		return $products_array;


	}



}


// $test = new Product_Manager();

// echo '<pre>';
// print_r($test->load_all_products());
// echo '</pre>';

?>