<?php 


	class Form{
		
		private $html;
		private $data_array;
		private $errors_array;

		public function __construct(){

	 		$this->html = '
	 			<form action="" method="post">
	 			<fieldset>
	 		';
	 		$this->data_array = array();
	 		$this->errors_array = array();
		}



		public function make_input($input_id,$input_name){

			$data = '';

			if(isset($this->data_array[$input_id])){
				$data = $this->data_array[$input_id];
			}
			
			$errors = '';

			if(isset($this->errors_array[$input_id])){
				$errors = $this->errors_array[$input_id];
			}

			$this->html .=  '
							<label for="'.$input_id.'">'.$input_name.'</label>
							<input type="text" name="'.$input_id.'" id="'.$input_id.'" value="'.$data.'" ><div class="errorMessage">'.$errors.'</div>
							<br />
							';
			$this->html .= $form_html;
		}//make_input


		

		public function make_password($password_id,$password_name){

			$errors = '';

			if(isset($this->errors_array[$password_id])){
				$errors = $this->errors_array[$password_id];
			}

			$this->html .=  '
							<label for="'.$password_id.'">'.$password_name.'</label>
							<input type="password" name="'.$password_id.'" id="'.$password_id.'" value="'.$data.'" ><div class="errorMessage">'.$errors.'</div>
							<br />
							';
			$this->html .= $form_html;
		}//make_psasword




		public function make_submit($submit_id,$submit_name){

			$this->html .=  '
							<input type="submit" name="'.$submit_id.'" id="'.$submit_id.'" value="'.$submit_name.'">
							';
			$this->html .= $form_html;
		}//make_submit






		public function check_required($control){

			$data = '';

			if(isset($this->data_array[$control])){

				$data = trim($this->data_array[$control]);

			}
			//if field is empty
			if(strlen($data) == 0){

				$this->errors_array[$control] = ' Can not be empty';

			}

		}






		public function raise_custom_error($control,$errorMessage){
			$this->errors_array[$control] = $errorMessage;
		}




		public function __get($property){
			switch ($property) {
				case 'html':
					return $this->html. '</fieldset></form>';
					break; 
				//error checking
				case 'valid':
					if(count($this->errors_array) == 0){
						return true;
					}else{
						return false;
					}
					break;       
				default:
					die('GET ERROR: Sorry, <b>'.$property.'</b> is not allowed to be read from');
			}
		}


		public function __set($property, $value){

		switch($property){

			case 'dataArray';
				$this->data_array = $value;
				break;
			case 'errorsArray';
				$this->errors_array = $value;
				break;
			default:
				die('SET ERROR: Sorry, <b>'.$property.'</b> is not allowed to be written to');

		}

	}


	}

 ?>