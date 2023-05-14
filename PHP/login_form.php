
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../CSS/app.css">

</head>
<body>
   
<div class="form-container">

<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){


   $email = mysqli_real_escape_string($conn, $_POST['email']);
   //$pass = md5($_POST['password']);
   $salt = "SUDO";
  
   $pass = $_POST['password'].$salt;
   $pass = md5($pass);
   
   // // $cpass = md5($_POST['cpassword']);
   //  $cpass = $_POST['cpassword'].$salt;
   //  $cpass = md5($cpass);
    
    

  // $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'Student'){

         $_SESSION['student_name'] = $row['name'];
         header('location:student_page.php');

      }
     
   }else{
      echo "User not found";
   };
}
?>




   <form action="" method="post">
      <h3>Login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div>
      <input type="email" name="email" required placeholder="enter your email" ></div>
      <div><input type="password" name="password" required placeholder="enter your password" ></div>
      <div><input type="submit" name="submit" value="login now" class="form-btn"></div>
      <div><p>Don't have an account? <a href="register_form.php">Register now</a></p></div>
   </form>

</div>

</body>
</html>