<?php
include '../Altair/config/config.php';
$consulta = mysqli_query($conn,"SELECT * FROM `depilacao`") or die('query failed');
?>    
<h3> Massagens </h3>
<?php while($dado = $consulta->fetch_array()){?> 
    <p><?php echo $dado["Nome"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $dado["Valor"];?> </strong> EUR </p>
<?php } ?>
</table>