<?php
// The amounts of products to show on each page
$num_products_on_each_page = 6;
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT ?,?');

// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of products
$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>

<?=template_header('Products')?>


<div class="products-wrapper">
    <h2>Products</h2>
    <p><?=$total_products?>Products</p>
    
        <?php foreach ($products as $product): ?>


            
<div class="products-container">
            <img src="image/<?=$product['image']?>" width="200" height="200" alt="<?=$product['title']?>">
            <a href="index.php?page=product&id=<?=$product['id']?>"class="product">
            </a>
<div class="textBox">
            <span class="title"><?=$product['title']?></span>
            <span class="price">
                &dollar;<?=$product['price']?></span>
</div>
</div>

        <?php endforeach; ?>


    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>