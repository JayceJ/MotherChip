<?php  

class Cart_View{

	public function render_cart($cart){

			$html = '';

			$html .= '<div id="shoppingCart">
						<table>
							<tr>
								<td>Product</td>
								<td>Quantity</td>
								<td>Price</td>
								<td>Total</td>

							</tr>';


		
			foreach($cart->contents as $product_id => $quantity){
				$product = new Product();
				$product->load($product_id);
			

				$html .= '<tr>
							<td>'.$product->productName.'</td>
							<td>'.$quantity.'</td>
							<td>'.$product->price.'</td>
							<td>'.$product->price * $quantity.'</td>
							<td><a href="remove_from_cart.php?productID='.$product_id.'">Remove</a></td>
						</tr>';

			}



			$html .= '
				</table>
				<a href="#" id="orderButton">Place Order</a>
			</div>';
		

		return $html;
	}


}







?>