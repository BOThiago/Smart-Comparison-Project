<?php
include('conexao.php');
session_start();

$user_check = $_SESSION['nome'];

$ses_sql = mysqli_query($usuarios,"select username from admin where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['nome'];

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}
?>