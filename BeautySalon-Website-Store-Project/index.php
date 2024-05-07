<?php
include "../Altair/config/config.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
else if(session_status() == $_SESSION){
    $user_id = $_SESSION['UserID'];
    $_SESSION = mysqli_query($conn, "SELECT * FROM `users` WHERE UserID = '$user_id' ") or die('query failed');
    session_start();
};

if (isset($_POST['send'])){ 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = $_POST['phone'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND phone = '$phone' AND message = '$message'") or die('query failed');

if (mysqli_num_rows($select_message) > 0){
    $msg[] = 'Mensagem enviada!';
}else{
    mysqli_query($conn, "INSERT INTO `message`(name, email, phone, message) VALUES('$name', '$email', '$phone', '$message')") or die('query failed');
    $msg[] = 'Mensagem enviada com sucesso!';
}
};

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altair Freire</title>
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
    <!--Map-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="crossorigin=""></script>    
</head>

<body>

    <?php include 'header.php'?> 

    <article>
        <div class="section-background" >      
            <img src="../Altair/img/logo.png" id="logo_img" srcset=""> 
            <img src="./img/" alt="">
        </div>   
    </article>
   
    <section class="about">
        <!---Popup---->
        <div class="center">
            <button class="book" 
                id="open-popup">
                <?php echo $lang['popup']?>
            </button>
        </div>

        <div class="popup" id="popup">
            <div class="overlay"></div>
            <div class="popup-content">
                <h2>Marque o seu agendamendo conosco!</h2>
                <p>Nos envie o seu pedido através do formulario abaixo, e nós o retornaremos o mais rapido possível. 
                    <br><br>
                    Horario de funcionamento de Segunda à Sexta das 10:00 às 20:00.
                </p>
                <br>
                <form action="" method="post" class="contact">
                    <input type="text" name="name" required placeholder="Seu nome" class="box">
                    <input type="email" name="email" required placeholder="Seu email" class="box">
                    <input type="tel" name="phone" required placeholder="Seu número de contacto" class="box">
                    <textarea name="message" class="box" placeholder="Sua menssagem" id="" cols="30" rows="10"></textarea>
                    <div class="Popup-btn">
                    <input type="submit" value="Enviar" name="send" placeholder="<?php echo"$msg";?>">
                    </div>
                    <div class="close-btn"></div>
                </form>
            </div>
        </div>

        <div class="flex">
            <div class="image">
                <a href="missao.php"><img src="./img/cortes/CM-1-2.jpg" alt="" ></a> 
            </div> 

            <div class="content">
                <h3>Sobre</h3>
                <p>Já com mais de duas décadas de experiência na área, já tento exercido em França, Brasil e agora neste momento em Portugal na cidade do Porto, eu juntamente com a minha equipe temos orgulho de dizer que deixamos nossa marca na cidade do Porto.</p>
                <a href="missao.php" 
                   class="btn">Nossa Missão</a>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="flex">
            <div class="content">
                <h3>Porque nós?</h3>
                <p>Temos os mais diversos serviços de bela com os melhores produtos do mercados, juntamente com uma equipe especializada para atender aos seus objetivos</p>
                <p>Clique no botão abaixo para ver a nossa tabela de serviços</p>
                <a href="servicos.php" 
                    class="btn">Serviços</a>
            </div>
            <div class="image">
                <a href="servicos.php"><img src="../Altair/img/cortes/CF-0.jpg" alt=""></a>
            </div>
        </div>
    </section>

    <section class="cortes">
        <div class="box-container">
        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
                <div class="carousel">
                    <img src="../Altair/img/cortes/CF-2.png" alt="" id="myImg">
                    <img src="../Altair/img/cortes/CM-2-2.png" alt="" id="myImg1">
                    <img src="../Altair/img/cortes/CM-1.png" alt="" id="myImg2">
                    <img src="../Altair/img/cortes/CF-0-1.jpg" alt="" id="myImg3">
                    <img src="../Altair/img/cortes/CF-0-2.jpg" alt="" id="myImg4">
                    <img src="../Altair/img/cortes/CF-1-2.jpg" alt="" id="myImg5">
                </div>
                <i id="right" class="fa-solid fa-angle-right"></i>
            </div>
        </div>       
    </section>

    <section class="reviews">
        <div class="box-container">
        <div class="box">
            <img src="../Altair/img/C1.png" alt="">
            <p> Muito bom, otimo atendimento e muito profissionais! </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
                <h3>Carla Souza</h3>
        </div>
        <div class="box">
            <img src="../Altair/img/C0.png" alt="">
            <p>Arrasa! Transformação total e perfeita, com apenas um simples corte de cabelo e um toque profissional !</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>S. Hallsted | DJ</h3>
        </div>
        <div class="box">
            <img src="../Altair/img/C2.png" alt="">
            <p> Arrasou no cabelo, adorei 👏👏👏👏👏 <br> Super indico !</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Luciana Freitas</h3>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="flex">
        <div class="content">
            <h3>Localização</h3>
            <p class="fas fa-map-marker"> Rua da Constituicao 621<br>4200-200 Porto</p><br>
            <p class="fa-solid fa-phone" <strong> +351 934 792 151 </strong> </a>  
            <p><strong>Horario</strong><br>Segunda - Sábado<br>10:00 às 20:00</p> 
        </div>
        <div id="map"></div>
        </div>
    </section>

    <section class="home-contact">
        <div class="content">
            <h3>Entre em contao conosco através do formulario abaixo !</h3><br>
        </div>
        <div class="contact">
            <form action="" method="post">
            <h3>Envie nós a sua requisição </h3>
                <input type="text" name="name" required placeholder="Seu nome" class="box">
                <input type="email" name="email" required placeholder="Seu email" class="box">
                <input type="tel" name="phone" required placeholder="Seu número de contacto" class="box">
                <textarea name="message" class="box" placeholder="Sua menssagem" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Envie" name="send" class="Popup-btn" placeholder="<?php echo"$msg";?>">
            </form>
        </div><br>
        <div class="content">
            <h3>Ou então, entre em contato direto conosco !</h3>
            <p>Entre em contato com nós através dos nosso contatos no roda pé do site ou através do nosso WhatsApp clicando no botão abaixo </p>
            <a href="https://api.whatsapp.com/send?phone=351919159773" 
               class="WhatsApp-btn">WhatsApp</a>
        </div>
    </section>
    
    <?php include 'footer.php'; ?>
    <script src="script/map.js"></script>
    <script src="script/popup.js"></script>
    <script src="script/user-btn.js"></script>
    <script src="script/carousel.js"></script>
</body>
</html>