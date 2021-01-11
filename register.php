
<?php 

session_start(); 
// require 'lib/password.php';
include_once 'server.php';
require 'errors.php';
$errors = array();
// $username = "";
// $mail    = "";
// $message = '';

if (isset($_POST['register'])) 

{
  
  // try{

  $pdo = config::pdo_connect_mysql();
//   $pdo = new PDO("mysql:host=localhost;dbname=tickets","root","root");
// } catch (PDOException $exc) {
//     echo $exc->getMessage();
//     exit();
// }

   // get values form input text and number
   
   $username = $_POST['username'];
   $mail = $_POST['mail'];
   $password = $_POST['password'];

       // mysql query to insert data

       $pdoQuery = "INSERT INTO `users`(`username`, `mail`, `password`) VALUES (:username,:mail,:password)";
    
       $pdoResult = $pdo->prepare($pdoQuery);
       
       $pdoExec = $pdoResult->execute(array(":username"=>$username,":mail"=>$mail,":password"=>$password));


        // check if mysql insert query successful
        if($pdoExec)
        {
            echo 'Data Inserted';
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
    <link rel="stylesheet" type="text/css" href="login.css">
</head> 

      <body>
      <img src="./image/Register.jpg" alt="register" class='image'>
      <div class="register">
      <h2>Medlemskap för dig som älskar musik.</h2>
      <h2>Sparad betalningshistorik.</h2>
      <h2>Få förtur på biljetter och nytt om kommande konsert.</h2>
      
        
        <form id='myForm' method="post" action="login.php">
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
          <p> Är du redan medlem?<a href="index.php?page=login">Logga in
          </p>

          <div class='userTerms' style='width:30px'>
          <input type='checkbox'name='agreement' class='form-check' value='Yes' required>

      
       <label for ='agreement' class='form_check_label'>I agree<a href='#'>term, conditions and policy</a>(*)</label>
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

     