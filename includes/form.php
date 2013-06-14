<?php 


	class Form{
		
		private $html;
		private $data_array;

		public function __construct(){
			$this->html = '<form action="" method="post">';
			$this->data_array = array();
		}

		public function temp_make_form(){

			$form_html = '';

			$form_html .= '<fieldset>';

			$form_html .= '<label for="username">Username:</label>
			<input type="text" id ="username" name="username" />
			<br />

			<label for="firstName">First Name:</label>
			<input type="text" id ="firstName" name="firstName" />
			<br />

			<label for="lastName">Last name:</label>
			<input type="text" id ="lastName" name="lastName" />
			<br />

			<label for="address">Address:</label>
			<input type="text" id ="address" name="address" />
			<br />

			<label for="phone">Phone:</label>
			<input type="text" id ="phone" name="phone" />
			<br />

			<label for="email">Email:</label>
			<input type="text" id ="email" name="email" />
			<br />

			<label for="password">Password:</label>
			<input type="password" id ="password" name="password" />
			<br />

			<label for="username">Confirm Password:</label>
			<input type="password" id ="password" name="password" />
			<br />


			<input name="go" id="go" type="submit" value="Submit" />';

			$form_html .= '</fieldset>';

			$this->html = $form_html;


		}//end temp function


		public function __get($property){
			switch ($property) {
				case 'html':
					return $this->html. '</form>';
					break; 
				// FOR ERROR CHECKING
				// case 'valid':
				// 	if(count($this->aErrors) == 0){
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