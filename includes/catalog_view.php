<?php 

	class Catalog_View{

		public function render_type($type){

			//initilising HTML
			$html = '';

			$html .= '<div id="content">';

			$products = $type->products;
			for ($i=0; $i < count($products); $i++) { 
				
				$current_product = $products[$i];

				$html .= '
						<div class="product">

							<h2>'.$current_product->productName.'</h2>

							<!-- product image goes here -->
							<img src="assets/images/'.$current_product->photoPath.'" alt="">

							<div class="productDescription"><p>'.$current_product->description.'</p></div>

							<div class="price"><p>$'.$current_product->price.'</p></div>

							<div class="stockLevel"><p>Current stock: '.$current_product->stockLevel.'</p></div>

							<!-- for an add to cart button -->
							<a href="#"><img src="assets/images/shoppingcart.gif" alt="Shopping cart logo"></a>

						</div>
					';
			}//end for

			$html .= '</div>'; //end content div

			return $html;
		}// end render type

		// condition: must pass in an array of products
		public function render_all_products($all_products){

			$html = '';

			$html .= '<div id="content">';


			for($i = 0; $i < count($all_products); $i++){

				$current_product = $all_products[$i];

				$html .= '
					<div class="product">

						<h2>'.$current_product->productName.'</h2>

						<!-- product image goes here -->
						<img src="assets/images/'.$current_product->photoPath.'" alt="">

						<div class="productDescription"><p>'.$current_product->description.'</p></div>

						<div class="price"><p>$'.$current_product->price.'</p></div>

						<div class="stockLevel"><p>Current stock: '.$current_product->stockLevel.'</p></div>

						<!-- for an add to cart button -->
						<a href="#"><img src="assets/images/shoppingcart.gif" alt="Shopping cart logo"></a>

					</div>
				';

			}
			$html .= '</div>'; //end content div

			return $html;
		}//end render all products 

		public function render_product($product){

			$html = '';

			$html = '

				<div id="content">

					<div class="product">

						<h2>'.$product->productName.'</h2>

						<!-- product image goes here -->
						<img src="assets/images/'.$product->photoPath.'" alt="">

						<div class="productDescription"><p>'.$product->description.'</p></div>

						<div class="price"><p>$'.$product->price.'</p></div>

						<div class="stockLevel"><p>Current stock: '.$product->stockLevel.'</p></div>

						<!-- for an add to cart button -->
						<a href="#"><img src="assets/images/shoppingcart.gif" alt="Shopping cart logo"></a>

					</div>
			
				</div>

			';

			return $html;

		}// end render product


		public function render_cart(){

			$html = '';

			$html .= '<div id="shoppingCart">
						<table>
							<tr>
								<td>Product</td>
								<td>Quantity</td>
								<td>Price</td>
								<td>Total</td>

							</tr>

							<tr>
								<td>Super Gweefix Card</td>
								<td>20</td>
								<td>2000</td>
								<td>40000</td>
								<td><a href="#">Remove</a></td>
							</tr>

							<tr>
								<td>Antec Eleven Hundred</td>
								<td>1</td>
								<td>200</td>
								<td>200</td>
								<td><a href="#">Remove</a></td>
							</tr>

						</table>
						<a href="#" id="orderButton">Place Order</a>
					</div>';
			
			$html .= '';
		}

	}//end class

 ?>