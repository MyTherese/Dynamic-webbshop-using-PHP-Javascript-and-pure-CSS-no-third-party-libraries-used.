<?php
if(!isset($_SESSION['id']) || !isset($_SESSION['logged_in'])){

    header('Location: login.php');
    exit;
} else{
    
echo 'Congratulations! You are logged in!';
}



