<?php
include "./config/config.php";
?>
<header class="header">
   <div class="header-0">
      <div class="flex">
      <div class="language">
            <a href="index.php?lang=pt"><?php echo $lang['lang_pt']?></a> 
            <a href="index.php?lang=fr"><?php echo $lang['lang_fr']?></a>
         </div>
      </div>
   </div>
   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="https://www.facebook.com/freirealtair2" class="fab fa-facebook-f"></a>
            <a href="https://www.instagram.com/altair.freire/" class="fab fa-instagram"></a>
            <a href="https://api.whatsapp.com/send?phone=351919159773" class="fab fa-whatsapp"></a>
         </div>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">

         <a href="../img/logo.png" class="logo"></a>
         <nav class="navbar">
            <a href="index.php" id="siteContent">Inicio</a>
            <a href="servicos.php" id="siteContent1">Serviços</a>
            <a href="loja.php" id="siteContent2">Loja</a>
         </nav>

      </div>
   </div>
</header>

<label>
   <input type="checkbox">
   <span class="menu"> 
      <span class="hamburger"></span> 
   </span>
   <ul>
      <li><a href="servicos.php" id="siteContent3">Serviços</a></li>
      <li><a href="missao.php" id="siteContent4">Nossa Missão</a></li>
      <li><a href="index.php" id="siteContent5">Página Inicial</a></li>
      </ul>
</label>