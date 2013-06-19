<?php 

	class Account_View{

		public function render_details($customer){

			//initilising HTML
			$html = '';

			$html .= '<div id="content">';			

			$html .= '
					<div class="account">
					<ul>
						<li>
							<span class="accountTitle">User Name : </span>
							<span class="accountDetail">'.$customer->userName.'</span>
						</li>

						<li>
							<span class="accountTitle">First Name : </span>
							<span class="accountDetail">'.$customer->firstName.'</span>
						</li>

						<li>
							<span class="accountTitle">Last Name : </span>
							<span class="accountDetail">'.$customer->lastName.'</span>
						</li>

						<li>
							<span class="accountTitle">Customer Number : </span>
							<span class="accountDetail">'.$customer->ID.'</span>
						</li>

						<li>
							<span class="accountTitle">Address : </span>
							<span class="accountDetail">'.$customer->address.'</span>
						</li>

						<li>
							<span class="accountTitle">Telephone : </span>
							<span class="accountDetail">'.$customer->telephone.'</span>
						</li>

						<li>
							<span class="accountTitle">Email : </span>
							<span class="accountDetail">'.$customer->email.'</span>
						</li>

						<li>
							<span class="accountTitle">Credit : </span>
							<span class="accountDetail">'.$customer->credit.'</span>
						</li>
					</ul>	

					<a href="edit_details.php"><div>Edit</div></a>						
					</div>
				';
			

			$html .= '</div>'; //end content div

			return $html;
		}// end render details		

	}//end class

 ?>