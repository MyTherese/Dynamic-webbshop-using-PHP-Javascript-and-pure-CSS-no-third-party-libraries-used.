
<?php 

session_start(); 
// require 'lib/password.php';
include_once 'server.php';
require 'errors.php';
$errors = array();
// $username = "";
// $mail = "";
// $message = '';







// validation and user data saved in database 
if (isset($_POST['register'])) 
{
  $pdo = config::pdo_connect_mysql();
//   $pdo = new PDO("mysql:host=localhost;dbname=tickets","root","root");
// } catch (PDOException $exc) {
//     echo $exc->getMessage();
//     exit();
// }
  $username = isset($_POST['username']) ?  $_POST['username'] : null;
  $mail = isset($_POST['mail']) ?  $_POST['mail'] : null;
  $password = isset($_POST['password']) ?  $_POST['password'] : null;
  // $password = $_POST['password'];

      //Check the name and make sure that it isn't a blank/empty string.
      if(strlen(trim($username)) === 0){
        //Blank string, add error to $errors array.
        $errors[] = "You must enter your name!";
    }
    //Make sure that the email address is valid.
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        //$email is not a valid email. Add error to $errors array.
        $errors[] = "That is not a valid email address!";
    }

    
      // validate password 
      if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        //$email is not a valid email. Add error to $errors array.
        $errors[] = "That is not a valid email address!";
    }



  // user input data posted in database
      $pdoQuery = "INSERT INTO `users`(`username`, `mail`, `password`) VALUES (:username,:mail,:password)";
      
      $pdoResult = $pdo->prepare($pdoQuery);
      $pdoExec = $pdoResult->execute(array(":username"=>$username,":mail"=>$mail,":password"=>$password));

  
        // check if mysql insert query successful
        if($pdoExec)
        { 
            // $message = "Success, you can now log in";
            // echo "<script type='text/javascript'>alert('$message');</script>"
            echo 'Success data in database';
        }else{
            echo 'Data Not Inserted';
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
      <h2>A membership for music lovers</h2>
      <h2>Get pre booked tickets for your favorit artist</h2>
      <h2>As member you always get the best price</h2>
      
        
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
            <input type="password" name="password" name="password" onfocus="this.value=''">
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
    // function checkForm(form){
    // if(!form.agreement.checked) {
    //       alert("Please indicate that you accept the Terms and Conditions");
    //       form.terms.focus();
    //       return false;
    //     }
    //     return true;
    // }

// function to clear form
    function resetForm() {
    document.getElementById("myForm").reset();
}

</script>

      </html>
