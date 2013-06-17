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
		}




		// public function make_submit()
		// public function check_required()

		public function make_input($input_id,$input_name){

			$this->html .=  '
							<label for="'.$input_id.'">'.$input_name.'</label>
							<input type="text" name="'.$input_id.'" id="'.$input_id.'" >
							<br />
							';
			$this->html .= $form_html;
		}//make_input

		public function make_password($password_id,$password_name){

			$this->html .=  '
							<label for="'.$password_id.'">'.$password_name.'</label>
							<input type="password" name="'.$password_id.'" id="'.$password_id.'" >
							<br />
							';
			$this->html .= $form_html;
		}//make_input

		public function make_submit($submit_id,$submit_name){

			$this->html .=  '
							<input type="submit" name="'.$submit_id.'" id="'.$submit_name.'" value="'.$submit_name.'">
							';
			$this->html .= $form_html;
		}//make_submit




		public function __get($property){
			switch ($property) {
				case 'html':
					return $this->html. '</fieldset></form>';
					break; 
				// FOR ERROR CHECKING
				// case 'valid':
				// 	if(count($this->errors) == 0){
				// 		return true;
				// 	}else{
				// 		return false;
				// 	}
				// 	break;       
				default:
					die('GET ERROR: Sorry, <b>'.$property.'</b> is not allowed to be read from');
				}
			}


	}

 ?>