<header class="header">
   <div class="header-2">
      <div class="flex">
         <nav class="navbar">
            <a href="loja.php">Inicio</a>
            <a href="cart.php">Minhas Compras</a>
            <a href="#"></a>
         </nav>
         <div class="icons">
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="../index.php" class="btn">Sair</a>
         </div>
      </div>
   </div>
</header>