<?php 
    $connect = mysqli_connect("localhost","root","") OR DIE("Falha ao conectar ao servidor");
    $db = mysqli_select_db($connect, "siteunb") OR DIE("Falha ao selecionar a DataBase");
?>
