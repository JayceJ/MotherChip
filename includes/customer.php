<?php 
include_once('wrapper.php');

class Customer{

	private $customer_id;
	private $first_name;
	private $last_name;
	private $address;
	private $telephone;
	private $email;
	private $user_name;
	private $password;
	private $credit;

	public function __construct(){

		$this->customer_id = 0;
		$this->first_name = '';
		$this->last_name = '';
		$this->address = '';
		$this->telephone = 0;
		$this->email = '';
		$this->user_name = '';
		$this->password = '';
		$this->credit = 0;
	}

	public function save(){

		$connection = new Database();

		$query = '
				  INSERT INTO tbcustomer (
					customerid,
					firstname,
					lastname,
					address,
					telephone,
					email,
					username,
					password,
					credit
				)
				VALUES (
					"'.$this->customer_id.'",
					"'.$this->first_name.'",
					"'.$this->last_name.'",
					"'.$this->address.'",
					"'.$this->telephone.'",
					"'.$this->email.'",
					"'.$this->user_name.'",
					"'.$this->password.'",
					"'.$this->credit.'"
				)

				 ';

		$result = $connection->query($query);

		if(!result){
			die($query. 'has failed.    customer.php - save()');
		}//end if

		$connection->close_connection();
	}//end save

	public function __get($property){

		switch($property){

			case 'firstName';
				return $this->first_name;
				break;
			case 'lastName';
				return $this->last_name;
				break;
			case 'address';
				return $this->address;
				break;
			case 'telephone';
				return $this->telephone;
				break;
			case 'email';
				return $this->email;
				break;
			case 'userName';
				return $this->user_name;
				break;
			case 'password';
				return $this->password;
				break;
			case 'credit';
				return $this->credit;
				break;
			default:
				die('GET ERROR customer.php: Sorry, <b>'.$property.'</b> is not allowed to be read from');
		}
	}//end get

	public function __set($property, $value){

		switch($property){

			case 'firstName';
				$this->first_name = $value;
				break;
			case 'lastName';
				$this->last_name = $value;
				break;
			case 'address';
				$this->address = $value;
				break;
			case 'telephone';
				$this->telephone = $value;
				break;
			case 'email';
				$this->email = $value;
				break;
			case 'userName';
				$this->user_name = $value;
				break;
			case 'password';
				$this->password = $value;
				break;
			case 'credit';
				$this->credit = $value;
				break;
			default:
				die('SET ERROR customer.php: Sorry, <b>'.$property.'</b> is not allowed to be read from');

		}
	}//end set


}//end class



//---------------TESTING-----------------

// $customer = new Customer();

// $customer->firstName = 'Woll';
// $customer->lastName = 'Smoth';
// $customer->address = '1 thisisanaddress road';
// $customer->telephone = 897623459;
// $customer->email = 'wollsmoth@nomail.com';
// $customer->userName = 'woll.smoth';
// $customer->password = 'thisisalsoapassword';
// $customer->credit = 20;

// $customer->save();



 ?>