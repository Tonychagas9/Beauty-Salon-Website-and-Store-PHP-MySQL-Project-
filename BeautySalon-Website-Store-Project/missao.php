<?php
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
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossa Missão</title>
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
    <?php
    include "header.php";
    ?>
    <section class="about">
        <div class="flex">
            <div class="content" style="background-color: white;">
                <h3 style="text-align: center;">Nossa Missão</h3><br>
                <p style="text-align: center;">
                    A nossa missão é proporcionar um espaço aberto e em constante mudança, no qual estilistas, artistas e clientes possam trabalhar em conjunto para criar não só um cabelo melhor, mas também um melhor sentido de objetivo, valor próprio e realização pessoal.<br><br>
                    Através desta relação de trabalho única, os nossos estilistas trabalham com os clientes a um nível muito pessoal para alcançar as suas ideias sobre uma imagem positiva.<br><br>
                    Ao permitir que um ambiente democrático e coletivo floresça entre a direção, os estilistas e os próprios clientes, Fringe evolui constantemente para ir ao encontro das necessidades e desejos de todos os envolvidos no nosso salão.<br><br>
                    Esforçamo-nos por utilizar o mundo que nos rodeia e a consciência colectiva dos nova-iorquinos como uma fonte constante de inspiração.
                </p><br>
                <a href="index.php" 
                   class="btn">Voltar para página inicial</a>
            </div>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
</body>
</html>