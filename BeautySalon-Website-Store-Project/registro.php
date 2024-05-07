<?php

include "./config/config.php";

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];
    
        $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND pass = '$pass'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'Usuario já existente!';
    }else{
        if($pass != $cpass){
        $message[] = 'Palavra passe incorreta ou não coincidente';
    }else{
        mysqli_query($conn, "INSERT INTO `users`(Nome, Email, Pass) VALUES('$name', '$email', '$cpass')") or die('query failed');
        $message[] = 'Registro feito com sucesso!';
        header('location:login.php');
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
   <title>Registro</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./style/style.css">

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
                <i class="fas fa-times"></i>
            </div>
            ';
            }
        }
    ?>
   
    <section class="about">
        <div class="flex">
            <div class="content">
                <div class="form-container">
                    <form action="" method="post">
                    <h3>Registra</h3>
                        <input type="text" name="name" placeholder="Seu nome" required class="box">
                        <input type="email" name="email" placeholder="Seu endereço de email" required class="box">
                        <input type="password" name="password" placeholder="Palavra-passe" required class="box">
                        <input type="password" name="cpassword" placeholder="Confirmar palavra-passe" required class="box">
                        <input type="submit" name="submit" value="Registra" class="btn">
                    <p>Já está registrado? <a href="login.php">Entra</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>Informações de Contato</h3>
         <p> <i class="fas fa-phone"></i> +351 934 792 151 </p>
         <p> <i class="fab fa-whatsapp"></i> +351 919 159 773 </p>
         <p> <i class="fas fa-envelope"></i> altairfreire@gmail.com </p>
         <p> <i class="fas fa-map-marker-alt"></i> Rua da Constituicao 621<br>4200-200 Porto </p>
      </div>
      <div class="box">
         <h3>Nós siga</h3>
         <a href="https://www.facebook.com/freirealtair2"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="https://www.instagram.com/altair.freire/"> <i class="fab fa-instagram"></i> instagram </a>
      </div>
   </div>
   <p class="credit"> &copy; copyright  @ <?php echo date('Y'); ?> by <span>Altair Freire</span> </p>
    </section>

    <script src="script/user-btn.js"></script>
</body>
</html>