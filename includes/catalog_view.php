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

							<!-- for an add to cart button -->
							<img src="" alt="">

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

						<!-- for an add to cart button -->
						<img src="" alt="">

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

						<!-- for an add to cart button -->
						<img src="" alt="">

					</div>
			
				</div>

			';

			return $html;

		}// end render product

	}//end class

 ?>