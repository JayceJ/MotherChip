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
		$this->telephone = '';
		$this->email = '';
		$this->user_name = '';
		$this->password = '';
		$this->credit = 0;
	}

	public function save(){

		$connection = new Database();

		if($this->customer_id == 0){

			$query = '
					  INSERT INTO tbcustomer (
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
			$this->customer_id = $connection->get_insert_id();

			if(!result){
				die($query. 'has failed.    customer.php - save()');
			}//end !result if

			//end first if
		}else{

			$update_query = '
							UPDATE tbcustomer
							SET FirstName =  "'.$this->firstName.'",
							LastName =  "'.$this->lastName.'",
							Address =  "'.$this->address.'",
							Telephone =  "'.$this->telephone.'",
							Email =  "'.$this->email.'"
							WHERE  CustomerID =' . $this->customer_id;

			$result = $connection->query($update_query);			
		}//end first if else		

		$connection->close_connection();
	}//end save





	public function load($id){
		$connection = new Database();

		$query = '
				SELECT customerid, firstname, lastname, address, telephone, email, username, password, credit
				FROM tbcustomer
				WHERE customerid =' . $id;

		$result = $connection->query($query);

		if(!$result){
			die($query. 'has failed.    customer.php - load()');
		}

		$customer_array = $connection->fetch_array($result);

		$this->customer_id = $customer_array['customerid'];
		$this->first_name = $customer_array['firstname'];
		$this->last_name = $customer_array['lastname'];
		$this->address = $customer_array['address'];
		$this->telephone = $customer_array['telephone'];
		$this->email = $customer_array['email'];
		$this->user_name = $customer_array['username'];
		$this->password = $customer_array['password'];
		$this->credit = $customer_array['credit'];

		$connection->close_connection();
	}








	public function load_by_username($username){
		$connection = new Database();

		$query = '
			SELECT customerID
			FROM tbcustomer
			WHERE username ="'.$username.'"';

		$result = $connection->query($query);

		$user_array = $connection->fetch_array($result);

		if ($user_array != false){
			$this->load($user_array["customerID"]);

			return true;
		}else{
			return false;
		}
	}



	public function __get($property){

		switch($property){

			case 'ID';
				return $this->customer_id;
				break;
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
			case 'confirmPassword';
				$this->confirmPassword = $value;
				break;
			case 'credit';
				$this->credit = $value;
				break;
			default:
				die('SET ERROR customer.php: Sorry, <b>'.$property.'</b> is not allowed to be written to');

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