
<?php
session_start();
require 'server.php';

    $pdo = config::pdo_connect_mysql();
// routing 
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
// Include and show the requested page
    include $page . '.php';

?>