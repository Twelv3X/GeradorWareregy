<?php
//Limpar as cookies e acabar a session depois de fazer logout
if(isset($_POST["logout"])){
  $hour = time() - 3600 *24 * 30;
  setcookie("userid", "", $hour, "/");
  setcookie("username", "", $hour);
  setcookie("active", "", $hour);
  session_start();
  session_destroy();
}
session_start();

if(isset($_COOKIE["username"])) $user = $_COOKIE["username"];
if (isset($_SESSION["name"])) $user = $_SESSION["name"];

//Se o utilizador já tiver uma sessão ativa, ele irá ser dirigido á página inicial
if (isset($user)) {
	header('Location: gerar_produtos.php');
	exit;
}

include "php/autenticar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- CSS -->
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid centro">
      <div class="row m-0 justify-content-center">
        <div class="col-md-4">
          <div class="card card-signin">
            <div class="card-body">
              <h5 class="card-title text-center">Entrar</h5>
              <form class="form-signin" method="POST" action="index.php">
                <div class="form-label-group mb-2">
                  <input type="email" name="useremail" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-label-group mb-2">
                  <input type="password" name="userpassword" class="form-control" placeholder="Password" required>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" name="lembrar" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Lembrar palavra-passe</label>
                </div>
                <?php if(isset($erro)){ ?>
                <div class="alert alert-danger" role="alert">
                  <?=$erro;?>
                </div>
                <?php } ?>
                <button class="btn btn-lg btn-dark btn-block text-uppercase " type="submit">Log in</button>
                <div class="text-center">
                  <p class="pb-0 mb-0 pt-3">Não tens uma conta? <a href="registar.php">Criar conta</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>  
  </body>
</html>