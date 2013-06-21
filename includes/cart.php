<?php 
	
	class Cart{

		private $contents_array;

		public function __construct(){
			$this->contents_array = array();
		}//construct

		public function add($productID, $quantity){
			if(isset($this->contents_array[$productID]) == false){
				$this->contents_array[$productID] = $quantity;
			}else{
				$this->contents_array[$productID] += $quantity;
			}
		}//add

		public function remove($productID, $quantity){			
			$this->contents_array[$productID] -= $quantity;

			if($this->contents_array[$productID] <= 0){
				unset($this->contents_array[$productID]);
			}
			
		}//remove

		public function __get($property){
			switch($property){

			case 'contents';
				return $this->contents_array;
				break;
			default:
				die('GET ERROR cart.php: Sorry, <b>'.$property.'</b> is not allowed to be read from');
			}
		}//get





	}//class


	// $cart = new Cart();
	// $cart->add(7,1);
	// $cart->add(5,6);
	// $cart->remove(5,1);
	
	// echo "<pre>";
	// print_r($cart);
	// echo "</pre>";
 ?>