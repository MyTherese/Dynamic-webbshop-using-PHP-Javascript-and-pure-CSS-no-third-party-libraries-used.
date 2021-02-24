<?php
        if(!isset($_SESSION['id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
    } else{
    echo '<script>alert("Du är nu inloggad!")</script>';
    }



