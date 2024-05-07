<?php

include "./config/config.php";

if(session_status() == PHP_SESSION_NONE){
   session_start();
}

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE Email = '$email' AND Pass = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['User_Type'] == 'admin'){

         $_SESSION['admin_name'] = $row['Nome'];
         $_SESSION['admin_email'] = $row['Email'];
         $_SESSION['admin_id'] = $row['UserID'];
         header('location:./adm_directories/admin_page.php');

      }elseif($row['User_Type'] == 'user'){

         $_SESSION['user_name'] = $row['Nome'];
         $_SESSION['user_email'] = $row['Email'];
         $_SESSION['user_id'] = $row['UserID'];
         header('location:./loja/loja.php');
      }

   }else{
      $message[] = 'Email ou Palavra-passe incorreta!';
   }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Entra</title>
   <link rel="icon" type="image/x-icon" href="../Altair/img/logo-icon.ico">
   <link rel="stylesheet" href="../Altair/style/style.css">
   <link rel="stylesheet" href="./style/header.css">
   <link rel="stylesheet" href="./style/portability.css">
   <link rel="stylesheet" href="./style/footer.css">
   <link rel="stylesheet" href="./style/conteiners.css">
   <link rel="stylesheet" href="./style/popup.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

   <?php
   include "header.php";
   ?>

   <?php
      if(isset($message)){
         foreach($message as $message){
         echo '
            <div class="message">
               <span>'.$message.'</span>
               <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
         ';
         }
      }
   ?>
   
   <div class="form-container">
      <form action="" method="post">
      <h3>Entra</h3>
      <input type="email" name="email" placeholder="Seu email" required class="box">
      <input type="password" name="password" placeholder="Palavra-passe" required class="box">
      <input type="submit" name="submit" value="login now" class="btn">
      <p>Não está registrado? <a href="registro.php"> Registre-se</a></p>
      </form>
   </div>

<?php
include "footer.php";
?>
<script src="script/user-btn.js"></script>

</body>
</html>