<?php  	


class Menu_View{




	public function render($types){


		$html = '';

		$html .= '<ul>';

		for($i = 0; $i < count($types); $i++){

			$current_type = $types[$i];
			$products = $current_type->products;

			$html .= '<li><a href="type_page.php?typeID='.$current_type->ID.'">'.$current_type->typeName.'</a></li> <ul>';

			for($j = 0; $j < count($products); $j++){

				$current_product = $products[$j];

				$html .= '<li><a href="product_page.php?productID='.$current_product->ID.'">'.$current_product->productName.'</a></li>';

			}


			$html .= '</ul>';


		}				


		$html .= '</ul>';

		return $html;


	}

}

?>