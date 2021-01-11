<?php


class config {
public static function pdo_connect_mysql() {
  $HOST = 'localhost';
  $USER = 'root';
  $PASS = 'root';
  $NAME = 'tickets';

  try {
  $pdo = new PDO("mysql:host=$HOST;dbname=$NAME", $USER, $PASS);
    

  } catch (PDOException $e) { 
    echo 'Connection failed : ' . $e->getMessage();   
  }
  return $pdo;
}

}
echo "connected";

function template_header($title) {
// Get the amount of items in the shopping cart, this will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

// when logged in show logged out
$logged_out = !empty($_SESSION['username']) ? 
      '<a href="logout.php">Logout</a>' :
      '<a href="login.php" class="login">login</a>';

echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
    <link href="main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

	</head>
  <body>
        <header>
        <video id="my-video" autoplay muted loop playsinline>   
        <source src="./image/rock.mp4" type="video/mp4"/>
        <li><a href="index.php" class="logo">Experience Music</a></li>
        <li><a href="index.php?page=products">Upcoming shows</a></li>
        </video>

        <div class="newsHeader">News for 2021</div>

            <nav class="header-nav">
                  <li><a class="fa fa-search"></a></li>
                  <li><a href="index.php" class="logo">Experience Music</a></li>
                  <li class = "upcomingshows"><a href="index.php?page=products">Upcoming shows</a></li>
                  $logged_out
                  <li><a href="index.php?page=cart">
        
                  <i class="fas fa-shopping-cart"></i>
                  <span>$num_items_in_cart</span></a></li>
            </nav> 
            <div class="bannerDiscount"> Not yet a member? Get 20% off on your first phurchase!</div>
        </header>
        </body>
        </html>

EOT;

}

?>



<?php
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        <footer>
                <p>&copy; $year, Shopping Cart System</p>
        </footer>
EOT;

}


?>



