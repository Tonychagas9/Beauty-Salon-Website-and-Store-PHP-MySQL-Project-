<?php
include "./config/config.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
else if(session_status() == $_SESSION){
    $user_id = $_SESSION['UserID'];
    $_SESSION = mysqli_query($conn, "SELECT * FROM `users` WHERE UserID = '$user_id' ") or die('query failed');
    session_start();
};

if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND UserID = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Já esta adicionado ao carinho de compras';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(UserID, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'Produto adicionado ao carrinho de compras';
   }
};

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <meta name="description" content="Salão de beleza e barbearia Altair Freire, temos uma diversidade de serviços como cortes de cabelos para homens e mulheres, escovas, penteados, Maquiagem, Mega Hair, Progressiva entre muitos outros outros, estamos localizados na cidade do Portp proximo a praça do Marques. ">
    <link rel="icon" type="image/x-icon" href="../Altair/img/logo-icon.ico">
    <link rel="stylesheet" href="../Altair/style/style.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/portability.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/conteiners.css">
    <link rel="stylesheet" href="./style/popup.css">
    <link rel="stylesheet" href="./style/carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="background-color: #f9f9f9;">

    <?php
        include "header.php";
    ?>

    <div class="heading">
        <h3>Loja</h3>
        <p><a href="index.php">Pagina inicial</a></p>
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="./img/p7.png" alt="" class="slide">
                <img src="./img/p8.png" alt="" class="slide">
            </div> 
            <div class="content">
                <h3>Sobre nossa Loja e Portal de vendas</h3>
                <p> Para alem dos nossos serviços de beleza e esteticos, também temos produtos para venda e encomenda.<br>
                    Voce pode fazer o seu registro conosco, para que voce tenha acesso a nossa loja e portal, e para que também sejá notificado sempre sobre novos produtos e novidades. 
                </p>
            </div>
        </div>
    </section>

    <div class="heading">
        <div class="content">
        <h3>Produtos</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div> 
    </div>

    <section class="cortes">
        <div class="box-container">
        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
                <div class="carousel">
                    <img src="./img/p1.png" alt="" class="">
                    <img src="./img/p2.png" alt="" class="">
                    <img src="./img/p3.png" alt="" class="">
                    <img src="./img/p4.png" alt="" class="">
                    <img src="./img/p5.png" alt="" class="">
                    <img src="./img/p6.png" alt="" class="">
                </div>
                <i id="right" class="fa-solid fa-angle-right"></i>
            </div>
        </div>     
    </section>

    <div class="heading">
        <div class="content">
        <h3>Cabelos</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita nulla recusandae !</p>
        </div>    
    </div>

    <section class="products">
        <div class="about">
            <div class="flex">
            <div class="content">
                <h3>Loja</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda consequuntur perspiciatis quasi facilis eius harum facere deserunt voluptatibus. Cupiditate dolorem porro eligendi aut, temporibus quidem recusandae placeat amet et incidunt eaque mollitia corporis dignissimos quaerat eos blanditiis ipsum ex inventore. Eveniet vero unde cupiditate eum nesciunt perferendis distinctio magni harum.
                </p>
                </div>
                <div class="image"><img src="../Altair/img/M1.png" alt=""></div> 
            </div>
        </div><br><br>

        <div class="box-container">
        <?php  
        $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
        if(mysqli_num_rows($select_products) > 0){
        while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <form action="" method="post" class="box">
            <img class="image" src="./adm_directories/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['Name']; ?></div>
            <div class="price">EUR €<?php echo $fetch_products['price'];?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['Name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <a href="login.php" type="submit" value="add to cart" name="add_to_cart" class="btn">Compra</a>
        </form>
        <?php
        }
        }else{
        echo '<p class="empty">Sem produtos adicionados ainda</p>';
        }
        ?>
        </div>
    </section>

    <?php
    include "footer.php";
    ?>
    <script src="script/user-btn.js"></script>
    <script src="script/carousel.js"></script>