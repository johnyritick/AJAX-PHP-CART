<?php

error_reporting(0);  
function displayproduct($Products)
{
 
    $html = '<div id="products">';
    foreach ($Products as $arr => $product) {
  
        $html .= "<form action='' method='GET'>
        <input type='hidden' name='Id' value=$product[id]>
        <div class='product' name='" . $product['name'] . "'>
        <img src='images/" . $product['image'] . "' />
        <h3 class='title'><a href='' id='" . $product['id'] . "'>" . $product['name'] . "</a></h3>
        <span>Price: $" . $product['price'] . "</span>
        <a  class='add-to-cart' id='cart' data-id='$product[id]' name='" . $product['id'] . "'>Add To Cart</a>
        </div>
        </form>
        ";
        }
    $html .= "</div>";
    return $html;
}

function cart($Products){
    $total =0;
    $html = '<table><tr>
                <th>Name</th>
                <th>Price</th>
                <th>per Item Price</th>
                <th>Action</th>
                <th>Id</th>
                <th>Quantity</th>
                </tr>';
    foreach ($_SESSION['unique'] as $key => $value) {
        foreach ($Products as $arr => $product) {
            if ($key == $product['id']) {
                $total += $value * $product['price'];
                $html .= "<tr style='text-align:center'>
				<td>$product[name]</td>
                <td>$ ".$value*$product['price']. "</td>
				<td>$ $product[price] </td>
				<input type='text' value=" . $product['id'] . " hidden>
				<td><a href=operations.php?id=$product[id]&action=delete>Delete</a></td>
				<td>$product[id]</td>
                <form action='operations.php?' method='get'>
                   <input type='hidden' name='id' value=$product[id]>
                   <input type='hidden' name='action' value='update'>
                    <td><input type='text' name='value'  onblur='form.submit()' value=$value></td>
                    </form>
			</tr>
			";
            }
        }
    }
    $html .= "</table><h1>Final Price : $ $total</h1>";

    return $html;
}

?>


		
