<?php 


	class Form{
		
		private $html;
		private $data_array;

		public function __construct(){
			$this->html = '<form action="" method="post">';
			$this->data_array = array();
		}

		public function temp_make_form(){

			$html = '';

			$html .= '<fieldset>';

			$html .= '<label for="username">Username:</label>
			<input type="text" id ="username" name="username" />

			<label for="firstName">First Name:</label>
			<input type="text" id ="firstName" name="firstName" />

			<label for="lastName">Last name:</label>
			<input type="text" id ="lastName" name="lastName" />

			<label for="address">Address:</label>
			<input type="text" id ="address" name="address" />

			<label for="phone">Phone:</label>
			<input type="text" id ="phone" name="phone" />

			<label for="email">Email:</label>
			<input type="text" id ="email" name="email" />

			<label for="password">Password:</label>
			<input type="password" id ="password" name="password" />

			<label for="username">Confirm Password:</label>
			<input type="password" id ="password" name="password" />


			<input name="go" id="go" type="submit" value="Submit" />';

			$html .= '</fieldset>';

			echo $html;


		}


	}

 ?>