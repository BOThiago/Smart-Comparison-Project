<?php
session_start();
include('conexao.php');

if(empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: login.html');
    exit();
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "select nome from usuarios where email = '{$email}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $usuarios = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $usuarios['email'];
    header('Location: painel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: login.php');
    exit();
}

