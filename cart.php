
<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // $discount = (int)$_POST['discount'];

    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);

    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                //update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;

}
;

// REMOVE 
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}


// UPDATE
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            //validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;

}

// Send the user to the order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

// Check the session variable for products in cart.
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;

$percentToGet= 20;
$percentInDecimal = $percentToGet / 100;


$discount = $discountOutput;
$subtotal_after_discount = 0.00;


if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

     // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }


    // check if code exists in database
    if(!empty($_POST["discountCode"])) {
        $stmt_discount = $pdo->prepare("SELECT price FROM discount WHERE code_discount= '" . $_POST["discountCode"] . "'");
    
        $stmt_discount->execute();
        $discount = $stmt_discount->fetch(PDO::FETCH_ASSOC);
            $message = "Your code is valid!";

        if(!empty(!$discount)){
            $message = "Your code is NOT valid!";

        }
    }

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cart.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<div class="containerShop">
    <h2>Your shopping cart</h2>

    <form action="index.php?page=cart" method="post" onsubmit="return validationDiscount();"> 

        <table class="cartTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            
            <tbody class="bodyShop">
                <?php if (empty($products)): ?>
                <tr>
                    <td>You have no tickets added in your Shopping Cart</td>
                </tr>
                
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                    <a href="index.php?page=cart&remove=<?=$product['id']?>">X</a>
                    <?=$product['title']?>
                    </td>
            
                    <td class="price"><?=$product['price']?>kr</td>

                    <td class="quantity">
                        <input type="number"  class="quantitys" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>

                    <td class="price"><?=$product['price'] * $products_in_cart[$product['id']]?>kr</td>

                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>




    <div class="discountTable">
        <div class="subtotal">
        <div class="discount">
            <span id="errorMessage_code" class="error-message">
            <?php
			if (!empty($message)) {
					echo $message;
            }
            ?>
            </span>

        <label for="promo_code"></label>
        <input id="discountCode" type="text" name="discountCode" class="discount_code" size="30" placeholder="Apply Discount Code"/>
        <button id="apply_discount" value="submit" class="buttonDiscount" name="apply_discount">Apply</button>
    </div>
        <input type="hidden" name="totalPrice" id="totalPrice" value="">
        <span class="text">New Total:</span>
        <span class="price"><?=$subtotal?>kr</span>
        </div>

        <div class="discount">
        <label for="discount_output">Discount:</label>

        <span class="discount_output"><?= $discount['price']?>%</span>
        </div>

        <div class="subtotal_after_disc">
        <label for="subtotal_after_discount">Total after discount:</label>


        <?php if($discount){ ?>
            <div class="subtotal_after_discount"><?= $subtotal - $percentInDecimal * $subtotal ?>kr</div>
        <?php } ?>
        
        <div class="subtotal_after_discount" style="display:none"><?= $subtotal - $percentInDecimal * $subtotal ?>kr</div>
          

        </div>

        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div> 
</div>


</form>
</div>

<button id ="displayFavo" onclick= "getSome()">Your favorites!</button>
<img src="" id="oFavoritList"></img>

</div>

</body>
</html>
<script type="text/javascript" src="localStorage.js"></script> 





