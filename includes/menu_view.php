<?php  	


class Menu_View{




	public function render($types){


		$html = '';

		$html .= '<ul>';

		for($i = 0; $i < count($types); $i++){

			$current_type = $types[$i];
			$products = $current_type->products;

			$html .= '<div class="navType"><li><a href="type_page.php?typeID='.$current_type->ID.'">'.$current_type->typeName.'</a></li></div> <ul>';

			for($j = 0; $j < count($products); $j++){

				$current_product = $products[$j];

				$html .= '<div class="navProduct"><li><a href="product_page.php?productID='.$current_product->ID.'">'.$current_product->productName.'</a></li></div>';

			}


			$html .= '</ul>';


		}				


		$html .= '</ul>';

		return $html;


	}

}

?>