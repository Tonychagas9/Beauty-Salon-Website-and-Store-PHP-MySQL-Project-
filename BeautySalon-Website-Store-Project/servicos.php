<?php

include '../Altair/config/config.php';

$consulta = mysqli_query($conn,"SELECT * FROM `servicos`") or die('query failed');

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
else if(session_status() == $_SESSION){
    $user_id = $_SESSION['UserID'];
    $_SESSION = mysqli_query($conn, "SELECT * FROM `users` WHERE UserID = '$user_id' ") or die('query failed');
    session_start();
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <meta name="description" content="Salão de beleza e barbearia Altair Freire, temos uma diversidade de serviços como cortes de cabelos para homens e mulheres, escovas, penteados, Maquiagem, Mega Hair, Progressiva entre muitos outros outros, estamos localizados na cidade do Portp proximo a praça do Marques. ">
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
    <?php include "header.php";?>

    <section class="about">
        <div class="flex">
            <div class="image">
                <a href="index.php"><img src="../Altair/img/cortes/CF-0.jpg" alt=""></a>
            </div>
            <div class="content">
                <h3>Porque nós?</h3>
                <p>Assim como pode ver na página inicial algumas fotografias de trabalhos realizados nas nossas instalações no centro do Porto, pode também aqui nesta sessão verificar dos nossos serviços e preços abaixo</p>
                <p>Qualquer duvida pode sempre entra em contato conosco através do nosso número de contato e WhatsApp</p>
                <a href="index.php" 
                    class="btn">Voltar para página inicial</a>
            </div>
        </div>
    </section>    

    <section class="servico"> 
        <div class="box-container">
            <div class="box">
                <?php include'../Altair/servicos/corte.php';?>
            </div>
            <div class="box">
                <?php include'../Altair/servicos/manicure.php';?>
            </div>
            <div class="box">
                <?php include'../Altair/servicos/olhos.php';?>
            </div>
            <div class="box">
                <?php include'../Altair/servicos/depilacao.php';?>
            </div>
            <div class="box">
                <?php include'../Altair/servicos/massagem.php';?>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="flex">
            <div class="content">
                <h3>Sobre os nossos serviços</h3><br>
                <p><strong>Processo único:</strong> um processo único é um serviço de cor feito num só passo. Normalmente utilizado para cobrir cinzentos ou escurecer. Pode ser utilizado para tornar o cabelo mais claro em alguns casos, mas apenas se não tiver cor no seu cabelo (isto inclui hena, amaciadores coloridos, enxaguamentos e glosses). O retoque da raiz é apenas nas raízes, uma mudança de cor completa pode exigir tempo e custos adicionais.</p><br>
                <p><strong>Meia cabeça:</strong> balayage ou madeixas em folha em todo o cabelo, exceto na parte de trás, por baixo do seu cabelo </p><br>
                <p><strong>Moldura do rosto:</strong> balayage ou madeixas em folha apenas à volta do rosto.</p><br>
                <p><strong>Gloss:</strong> também conhecido como tonalizante. Uma cor não permanente que dá tom e brilho. Só pode ser aplicado ao mesmo nível ou mais escuro do que o seu cabelo atual. Ótimo para anular o calor das madeixas acastanhadas entre serviços ou para refrescar o seu processo único para ficar mais rico ou vibrante.
                Os seguintes serviços não estão disponíveis para reserva online, porque preferimos fazer uma consulta por e-mail ou ter uma conversa telefónica rápida para nos certificarmos de que está a reservar o serviço correto. </p><br>
                <p><strong>Processo duplo:</strong> normalmente utilizado para obter um louro sólido em todo o cabelo. Todo o cabelo é descolorado e, em seguida, é efectuado um serviço de tonalização/brilho em todo o cabelo. </p><br>
                <p><strong>Cor fantasia:</strong> todos os seus azuis, verdes, roxos, rosas, etc. Podemos consultá-la para determinar a quantidade de cor que pretende ver e a sua colocação para determinar o momento e a técnica.</p><br>
                <p><strong>Correção da cor:</strong> se já tem cor no seu cabelo e pretende uma mudança significativa, pode enquadrar-se neste serviço.Provavelmente, pedir-lhe-emos que nos envie por e-mail uma fotografia do seu cabelo atual e dos seus objectivos em termos de cabelo, para que saiba o que é possível alcançar. Normalmente, são necessárias várias consultas para atingir a cor ideal.</p>
            </div>
        </div>
    </section>
    
    <section class="home-contact">
        <div class="content">
            <h3>Tem alguma questão ?</h3>
            <p>Entre em contato com nós através dos nosso contatos no roda pé do site ou através do nosso WhatsApp clicando no botão abaixo </p>
            <a href="https://api.whatsapp.com/send?phone=351919159773" 
               class="WhatsApp-btn">WhatsApp</a>
        </div>
    </section>
   
   <?php include "footer.php";?>
   <script src="script/user-btn.js"></script>
</body>
</html>