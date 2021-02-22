
<?php 
session_start(); 
include_once 'server.php';
require 'errors.php';
$errors = array();

// validation and user data saved in database 
if (isset($_POST['register'])) {

  $username = trim($_POST['username']);
  $mail = trim($_POST['mail']);
  $password = trim($_POST['password']);
  $confirm_password  = trim($_POST['confirm_password']);

  $isValid = true;
    
    if($username == '' || $mail == '' || $password == '' || $confirm_password == ''){
      $isValid = false;
      $errors[] = "Please fill all fields.";
    }

    if($isValid && !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $isValid = false;
      $errors[] = "Invalid Email-ID.";
    }
    if($isValid && ($password != $confirm_password)){
      $isValid = false;
      $errors[] = "Password do not match!";
    }


      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $number    = preg_match('@[0-9]@', $password);
      
      if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        $isValid = false;
        $errors[] = "Password must contain atleast 8 caracthers of one lowercase uppercase and a number !";
      }    

  
    if($isValid){

      $pdo = config::pdo_connect_mysql();
      $query = $pdo->prepare( "SELECT * FROM `users` WHERE `mail` = ?" );

      $query->bindValue( 1, $mail);
      $query->execute();
        if( $query->rowCount() > 0 ){ 
          $isValid = false;
          $errors[] = "Email already exists!";  
        }

      $stmt = $pdo->prepare( "SELECT username FROM users WHERE username = :username" );

      $stmt->bindValue( ':username', $username);
      $stmt->execute();
          if( $stmt->rowCount() > 0 ) { 
            $isValid = false;
            $errors[] = "Username already exists!";
          }
  }

    if($isValid){
  
    $pdo = config::pdo_connect_mysql();
        // user input data posted in database
      $pdoFormQuery = "INSERT INTO `users`(`username`, `mail`, `password`) VALUES (:username,:mail,:password)";
      
      $pdoResult = $pdo->prepare($pdoFormQuery);
      $pdoExec = $pdoResult->execute(array(":username"=>$username,":mail"=>$mail,":password"=>$password));
        // check if mysql insert query successful
        if($pdoExec){ 
            header('location:login.php');
            // $errors[] = "Success";
          }else{
            $errors[] = "Something went wrong!";
            
        }
    }

}
    ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <title>User registration PHP</title>
    <link rel="stylesheet" type="text/css" href="reg_login.css">
</head> 

<body>
    <img src="./image/Register.jpg" alt="register" class='image'>
  <div class="register">
      <h2>A membership for music lovers!</h2>
      <h2>Get pre booked tickets for your favorit artist!</h2>
      <h2>As member you always get the best price!</h2>
    
  <form id="myForm" method="post" action="register.php" name ="registration">
  <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="" placeholder="username">
    </div>

    <div class="input-group">
      <label>Email</label>
      <input type="text" name="mail" value="" placeholder="mail">
    </div>   

    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" onfocus="this.value=''">
    </div>

    <div class="input-group">
      <label>Confirm Password</label>
      <input type="password" name="confirm_password" onfocus="this.value=''">
    </div>
          <!-- användarvillkor -->
      <p> Already a member?<a href="index.php?page=login">Log in here
      </p>

    <div class="userTerms">
      <input type='checkbox' name='agreement' class='form-check' value='Yes' required>
      <label for ='agreement' class="form_check_label"><a href='#'>I agree for term, conditions and policy</a>(*)</label>
    </div>

    <div class="input-group">
      <button type="submit" class= "btn" name="register" value="">Register</button>
    </div>

    <div>
        <input type="button" onclick="resetForm()" value="Clear">
    </div>
  </form> 

  </div>
</body>


<script>

// checkbox terms 
    function checkForm(form){
    if(!form.agreement.checked) {
          alert("Please indicate that you accept the Terms and Conditions");
          form.terms.focus();
          return false;
        }
        return true;
    }

// function to clear form
    function resetForm() {
    document.getElementById("myForm").reset();
    }

</script>
</html>
