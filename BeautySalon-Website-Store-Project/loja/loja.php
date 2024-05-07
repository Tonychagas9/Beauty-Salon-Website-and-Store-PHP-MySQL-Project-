<?php
$conn = mysqli_connect('localhost','root','','altair') or die('connection failed');

session_start();

$user_id = $_SESSION['user_id'];

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'Produto já adicionado ao carrinho';
    }else{
       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) 
            VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") 
        or die('query failed');
       $message[] = 'Produto adicionado';
    }
 
 }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/portability.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/conteiners.css">
    <link rel="stylesheet" href="../style/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

    <?php
    include "header-store.php";
    ?>

<div class="heading">
        <h3>Loja Online</h3>
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
                <div class="image"><img src="../img/M1.png" alt=""></div> 
            </div>
        </div><br><br>

        <div class="box-container">
        <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="../adm_directories/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['Name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['Name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">Sem produtos</p>';
      }
      ?>
        </div>
    </section>
    
    
    <script src="../script/user-btn.js"></script>
</body>
</html>
