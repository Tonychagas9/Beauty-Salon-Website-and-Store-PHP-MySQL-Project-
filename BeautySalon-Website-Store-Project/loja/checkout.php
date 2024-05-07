<?php

$conn = mysqli_connect('localhost','root','','altair') or die('connection failed');

if(session_status() == PHP_SESSION_NONE){
   session_start();
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE UserID = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'Carinho facil';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Pedido pronto!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(UserID, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'pedido feito com sucesso!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE UserID = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Compras</title>
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
   <h3>Pagamento</h3>
   <p> <a href="home.php">Inicio</a> / Pagamentos </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Seu carrinho esta vazio</p>';
   }
   ?>
   <div class="grand-total"> Total : <span>$<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Complete seu pedido</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Seu nome :</span>
            <input type="text" name="name" required placeholder="Introduza seu nome">
         </div>
         <div class="inputBox">
            <span>Contacto telefonico :</span>
            <input type="number" name="number" required placeholder="Introduza seu número">
         </div>
         <div class="inputBox">
            <span>Seu Email :</span>
            <input type="email" name="email" required placeholder="Introduza seu email">
         </div>
         <div class="inputBox">
            <span>Metodos de Pagamentos :</span>
            <select name="method">
               <option value="cash on delivery">Dinheiro na Entrega</option>
               <option value="credit card">Cartão de Credito</option>
               <option value="paypal">Paypal</option>
               <option value="paytm">Pay ATM</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Endereço :</span>
            <input type="number" min="0" name="flat" required placeholder="Número casa, ou apartamento">
         </div>
         <div class="inputBox">
            <span>Endereço :</span>
            <input type="text" name="street" required placeholder="Rua de morada e codigo postal">
         </div>
         <div class="inputBox">
            <span>Cidade :</span>
            <input type="text" name="city" required placeholder="Sua cidade">
         </div>
         <div class="inputBox">
            <span>Estado :</span>
            <input type="text" name="state" required placeholder="Estado ou provincia">
         </div>
         <div class="inputBox">
            <span>País :</span>
            <input type="text" name="country" required placeholder="Pais">
         </div>
         <div class="inputBox">
            <span>Codigo Pin :</span>
            <input type="number" min="0" name="pin_code" required placeholder="exemplo: 123456">
         </div>
      </div>
      <input type="submit" value="Finalizar pedido" class="btn" name="order_btn">
   </form>

</section>

<?php include 'footer-store.php'; ?>
<script src="../script/user-btn.js"></script>

</body>
</html>