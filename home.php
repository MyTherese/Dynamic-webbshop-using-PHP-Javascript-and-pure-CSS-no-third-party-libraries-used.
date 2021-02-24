<?php

$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 6');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
</head>
    
<body>

    <div id="containerImages" class="containerProducts" >
        <?php foreach ($recently_added_products as $k => $v): ?>
        
        <a href="index.php?page=productCard&id=<?=$recently_added_products[$k]['id']?>">
        <div class="imagebox">
            <img src="image/<?=$recently_added_products[$k]['image']?>" width="250" height="250" id="myImage" alt="<?=$recently_added_products[$k]['title']?>">
            <div class="titlebox">
            <span class="name"><?=$recently_added_products[$k]['title']?></span>
            </div> 
        </a>

        <button src ="image/<?=$recently_added_products[$k]['image']?>" id ="image/<?=$recently_added_products[$k]['image']?>" onclick="saveFavorit(this.id)" class="fa fa-heart-o">
        </button>

        </div>
        <?php endforeach; ?>

    </div>
</body>
</html>


<script type="text/javascript" src="localStorage.js"></script>




