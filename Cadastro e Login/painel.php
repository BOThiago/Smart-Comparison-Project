<?php
session_start();
include('verifica.php');
?>

<h2>Olá, <?php echo $_SESSION['nome'];?></h2>
<h2><a href="logout.php">Sair</a></h2>