<?php 


	class Form{
		
		private $html;
		private $data_array;
		private $errors_array;
		private $files_array;

		public function __construct(){

	 		$this->html = '
	 			<form enctype="multipart/form-data" action="" method="post">
	 			<fieldset>
	 		';
	 		$this->data_array = array();
	 		$this->errors_array = array();
	 		$this->files_array = array();
		}



// d8888b.  .d8b.  .d8888. d888888b  .o88b.      d88888b  .d88b.  d8888b. .88b  d88. 
// 88  `8D d8' `8b 88'  YP   `88'   d8P  Y8      88'     .8P  Y8. 88  `8D 88'YbdP`88 
// 88oooY' 88ooo88 `8bo.      88    8P           88ooo   88    88 88oobY' 88  88  88 
// 88~~~b. 88~~~88   `Y8b.    88    8b           88~~~   88    88 88`8b   88  88  88 
// 88   8D 88   88 db   8D   .88.   Y8b  d8      88      `8b  d8' 88 `88. 88  88  88 
// Y8888P' YP   YP `8888Y' Y888888P  `Y88P'      YP       `Y88P'  88   YD YP  YP  YP

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


		public function raise_custom_error($control,$error_message){
			$this->errors_array[$control] = $error_message;
		}




// d88888b d888888b db      d88888b      db    db d8888b. db       .d88b.   .d8b.  d8888b. 
// 88'       `88'   88      88'          88    88 88  `8D 88      .8P  Y8. d8' `8b 88  `8D 
// 88ooo      88    88      88ooooo      88    88 88oodD' 88      88    88 88ooo88 88   88 
// 88~~~      88    88      88~~~~~      88    88 88~~~   88      88    88 88~~~88 88   88 
// 88        .88.   88booo. 88.          88b  d88 88      88booo. `8b  d8' 88   88 88  .8D 
// YP      Y888888P Y88888P Y88888P      ~Y8888P' 88      Y88888P  `Y88P'  YP   YP Y8888D' 





		public function make_file_upload($control,$label){


			$errors = "";
			if(isset($this->errors_array[$control])){
				$errors = $this->errors_array[$control];
			}

			$this->html .= '<label for="'.$control.'">'.$label.':</label>
					<input type="file" name="'.$control.'" id="'.$control.'" />
					<div class="errorMessage">'.$errors.'</div>
					<br />
					';
		}//make_file_upload

		public function check_image_upload($control){
			$file = $this->files_array[$control];
			$sError = "";

			if((!empty($file)) && ($file['error'] == 0)) {
				//Check if the file is JPEG image and it's size is less than 350Kb
				$filename = basename($file['name']);
				$ext = substr($filename, strrpos($filename, '.') + 1);
				if (($ext == "jpg") && ($file["type"] == "image/jpeg") && ($file["size"] < 1000000000)) {
				// do nothing
				}else{
					$sError = "Error: Only .jpg images under 350Kb are accepted for upload";
				}
			}else{
				$sError = "Error: No file uploaded";
			}

			if($sError != "" ){
				$this->errors_array[$control] = $sError;

			}


		}//check_image_upload



		public function move_file($control,$new_name){
			$file = $this->files_array[$control];

			$new_name = dirname(__FILE__).'/../assets/images/'.$new_name;
			// echo $new_name;
			move_uploaded_file($file['tmp_name'],$new_name);
		}//moveFile

                                                                                       



//  d888b  d88888b d888888b      .d888b.       .d8888. d88888b d888888b 
// 88' Y8b 88'     `~~88~~'      8P   8D       88'  YP 88'     `~~88~~' 
// 88      88ooooo    88         `Vb d8'       `8bo.   88ooooo    88    
// 88  ooo 88~~~~~    88          d88C dD        `Y8b. 88~~~~~    88    
// 88. ~8~ 88.        88         C8' d8D       db   8D 88.        88    
//  Y888P  Y88888P    YP         `888P Yb      `8888Y' Y88888P    YP    

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
		}//get


		public function __set($property, $value){

			switch($property){

				case 'dataArray';
					$this->data_array = $value;
					break;
				case 'errorsArray';
					$this->errors_array = $value;
					break;
				case 'filesArray';
					$this->files_array = $value;
					break;
				default:
					die('SET ERROR: Sorry, <b>'.$property.'</b> is not allowed to be written to');

			}//switch

		}//set

}//class form
?>