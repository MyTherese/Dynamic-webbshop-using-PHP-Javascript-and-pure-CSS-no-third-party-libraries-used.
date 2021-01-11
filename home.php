
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
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
</head>
    
<body>

    <div id="containerImages" class="containerProducts" >
        <?php foreach ($recently_added_products as $k => $v): ?>
        <a href="index.php?page=productCard&id=<?=$recently_added_products[$k]['id']?>">
        
        <div class="imagebox">
        <img src="image/<?=$recently_added_products[$k]['image']?>" width="200" height="200" id="myImage" alt="<?=$recently_added_products[$k]['title']?>">

        <div class="titlebox">
        <span class="name"><?=$recently_added_products[$k]['title']?></span>
        </div> 
        </a>

        <button id= "addtoFavo" onclick="saveFavorit(this)" class="fa fa-heart-o">
        </button>
        </div>

        <?php endforeach; ?>
        </div>
</body>

<!-- <img src="image/Green_day.jpg" height="200" width="00" alt="GreenDay"> -->
<!-- <?=template_footer('footer')?> -->

</html>


<script type="text/javascript" src="localStorage.js"></script>
