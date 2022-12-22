<?php
   include("conexao.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {


      $myusername = mysqli_real_escape_string($usuarios,$_POST['nome']);
      $mypassword = mysqli_real_escape_string($usuarios,$_POST['senha']);

      $sql = "SELECT id FROM usuarios WHERE nome = '$myusername' and senha = '$mypassword'";
      $result = mysqli_query($usuarios,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);



      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entrar</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/creative.min.css" rel="stylesheet">

    <meta name="description" content="Uma empresa de buscas online, com o objetivo de facilitar a consulta de produtos online">

    <meta name="keywords" content="Smart Comparison, Comparacoes de smartphones, processadores e placas-de-video">

    <meta name="author" content="Smart Comparison Studios">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style1.css">

    <link rel="stylesheet" href="../Js%20app/main.js">

    <body id="page-top">


<div class="container">
    <section>
        <h1>Entrando</h1>
        <hr> <br> <br>

        <?php
        if(isset($_SESSION['nao_autenticado'])):
            ?>
            <div class="notification is-danger">
                <p>Usuário ou senha inválidos.</p>
            </div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>

        <form method="post" action="processa2.php">
            Email <br>
            <input type="email" name="email" class="campo" maxlength="50" required> <br>
            Senha <br>
            <input type="password" name="senha" class="campo" maxlength="20" required> <br>

            <input type="submit" value="Entrar" class="btn" id="entrar" name="entrar"> <br>

            <li><a href = "Cadastre-se.html"> Nao possui uma conta ? Clique aqui ! </a></li>

        </form>

</head>
<body>

</body>
</html>

