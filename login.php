<?php  
     session_start(); 
     include_once 'server.php';
     $HOST = 'localhost';
     $USER = 'root';
     $PASS = 'root';
     $NAME = 'tickets';

     $errors = array();

     try {  
          $pdo = new PDO("mysql:host=$HOST;dbname=$NAME", $USER, $PASS);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

     if(isset($_POST['login'])) {  
          if(empty($_POST["username"]) || empty($_POST["password"])) {  
               $errors[] = '<label>All fields are required</label>';  
          }else {  
               $query = "SELECT * FROM users WHERE username = :username AND password = :password";  
               $statement = $pdo->prepare($query);  
               $statement->execute(  
                    array(  
                         'username' => $_POST["username"],  
                         'password' => $_POST["password"]));  
               $count = $statement->rowCount();  
               if($count > 0) {  
                    $_SESSION["username"] = $_POST["username"];  
                    header("location:index.php");  
               }else { 
                    $errors[] = '<label>Wrong Data</label>';  
               }  
          }  
     }  
     }  
     catch(PDOException $error)  
     {  
          $errors[] = $error->getMessage();  
     }  
     ?>  

     <!DOCTYPE html>
     <html lang="en">
     <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>Login</title>
     <link rel="stylesheet" type="text/css" href="./css/reg_login.css">
     </head> 

     <body>
     <img src="./image/Register.jpg" alt="register" class='image'>
     <div class="login">
     <h2>Login</h2>
     <?php 
          if($login_error_message != ""){
          echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
          }
     ?> 

     <form id='logForm' method="post" action="login.php"> 

          <?php include('errors.php'); ?>

          <div class="input-group">
          <label for='username'>Username</label>
          <input type="text" name="username" onfocus="this.value=''">
          </div>

          <div class="input-group">
          <label for='password'>Password</label>
          <input type="password" name="password" id="password" onfocus="this.value=''">
          <i class="fa fa-eye" id="togglePassword"></i>
          </div>
          
          <div class="input-group">
               <button type="submit" name="login" class="btn" value ="">Confirm</button>
          </div>

          <p> Not yet a member?<a href="index.php?page=register">Sign up</a>

          </p>
     </form>
     <div>
     </body>
     <script type="text/javascript" src="localStorage.js"></script>
     </html>