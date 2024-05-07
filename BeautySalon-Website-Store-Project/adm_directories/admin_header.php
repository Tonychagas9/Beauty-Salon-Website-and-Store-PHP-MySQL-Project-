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

<header class="header">
   <div class="flex">
      <a href="admin_page.php" class="logo">Adiministrator<span>Panel de Controle</span></a>
      <nav class="navbar">
         <a href="admin_page.php">Inicio</a>
         <a href="admin_products.php">Produtos</a>
         <a href="admin_orders.php">Pedidos</a>
         <a href="admin_users.php">Usuarios</a>
         <a href="admin_contacts.php">Mensagens</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>Usuario : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="../logout.php" class="delete-btn">Sair</a>
         <div>Nova <a href="login.php">Sessão</a> | <a href="register.php">Registro</a></div>
      </div>

   </div>

</header>