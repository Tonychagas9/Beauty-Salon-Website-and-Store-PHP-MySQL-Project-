<?php

$conn = mysqli_connect('localhost','root','','altair') or die('connection failed');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contas Registradas</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../style/adm_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title"> Usuarios com contas registradas no site </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> ID de Usuario : <span><?php echo $fetch_users['UserID']; ?></span> </p>
         <p> Nome de Usuario : <span><?php echo $fetch_users['Nome']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_users['Email']; ?></span> </p>
         <p> Tipo de Usuario : <span style="color:<?php if($fetch_users['User_Type'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['User_Type']; ?></span> </p>
         <a href="admin_users.php?delete=<?php echo $fetch_users['UserID']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>

<script src="../script/admin_script.js"></script>

</body>
</html>