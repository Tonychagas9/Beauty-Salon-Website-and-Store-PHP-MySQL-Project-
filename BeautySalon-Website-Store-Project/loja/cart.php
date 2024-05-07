<?php

$conn = mysqli_connect('localhost','root','','altair') or die('connection failed');

if(session_status() == PHP_SESSION_NONE){
   session_start();
}

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id  = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Carrinho</title>
   <meta name="description" content="Salão de beleza e barbearia Altair Freire, temos uma diversidade de serviços como cortes de cabelos para homens e mulheres, escovas, penteados, Maquiagem, Mega Hair, Progressiva entre muitos outros outros, estamos localizados na cidade do Portp proximo a praça do Marques. ">
    <link rel="icon" type="image/x-icon" href="../Altair/img/logo-icon.ico">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/portability.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/conteiners.css">
    <link rel="stylesheet" href="../style/popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
   
   <?php include 'header-store.php'; ?>
      <div class="heading">
         <p><a href="home.php">Inicio</a><br> 
            <strong>Carrinho</strong></p>
      </div>

   <section class="shopping-cart">
      <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>

      <div class="box">
   
         <img src="../adm_directories/uploaded_img/<?php echo $fetch_cart['image'];?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         <div class="price">EUR €<?php echo $fetch_cart['price']; ?></div>
         <a href="cart.php?delete=<?php echo $fetch_cart['cart_id']; ?>" class="btn" onclick="return confirm('Apagar este produto do carrinho?');">Apagar Produto</a><br>
         
         <div class="sub-total"> Sub total : <span> EUR €<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span> </div>
      
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">Seu carrinho está fazio</p>';
      }
      ?>
      </div>

      <div style="margin-top: 2rem; text-align:center;">
         <a href="cart.php?delete_all" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Apagar produto do seu carrinho?');">Apagar todos</a>
      </div>

      <div class="cart-total">
         <p> Total : <span>EUR €<?php echo $grand_total;?></span></p>
         <div class="flex">
            <a href="loja.php" class="btn">Continuar à ver produtos</a>
            <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Completar compra</a>
         </div>
      </div>

   </section>


<script src="../script/user-btn.js"></script>
</body>
</html>