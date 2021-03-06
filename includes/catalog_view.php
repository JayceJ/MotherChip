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
							<img src="assets/images/'.$current_product->photoPath.'" width="185" height="100" alt="">

							<div class="productDescription"><p>'.$current_product->description.'</p></div>

							<div class="price"><p>$'.$current_product->price.'</p></div>

							<div class="stockLevel"><p>Current stock: '.$current_product->stockLevel.'</p></div>

							<!-- for an add to cart button -->
							<a href="add_to_cart.php?productID='.$current_product->ID.'"><img src="assets/images/shoppingcart.gif" alt="Shopping cart logo"></a>

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
						<img src="assets/images/'.$current_product->photoPath.'" width="185" height="100" alt="">

						<div class="productDescription"><p>'.$current_product->description.'</p></div>

						<div class="price"><p>$'.$current_product->price.'</p></div>

						<div class="stockLevel"><p>Current stock: '.$current_product->stockLevel.'</p></div>

						<!-- for an add to cart button -->
						<a href="add_to_cart.php?productID='.$current_product->ID.'"><img src="assets/images/shoppingcart.gif" alt="Shopping cart logo"></a>

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
						<img src="assets/images/'.$product->photoPath.'" width="185" height="100" alt="">

						<div class="productDescription"><p>'.$product->description.'</p></div>

						<div class="price"><p>$'.$product->price.'</p></div>

						<div class="stockLevel"><p>Current stock: '.$product->stockLevel.'</p></div>

						<!-- for an add to cart button -->
						<a href="add_to_cart.php?productID='.$product->ID.'"><img src="assets/images/shoppingcart.gif" alt="Shopping cart logo"></a>

					</div>
			
				</div>

			';

			return $html;

		}// end render product	


	}//end class

 ?>