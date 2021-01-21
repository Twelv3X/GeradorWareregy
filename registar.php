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
<?php include "php/criarconta.php"; ?>
<body>
<div class="container-fluid centro">
      <div class="row m-0 justify-content-center">
        <div class="col-md-4">
          <div class="card card-signin">
            <div class="card-body">
              <h5 class="card-title text-center">Registar conta</h5>
              <form class="form-signin" method="POST" action="registar.php">
                <div class="form-label-group mb-2">
                  <input type="email" name="useremail" class="form-control" placeholder="Email address" required>
                </div>
                <div class="form-label-group mb-2">
                  <input type="text" name="usernome" class="form-control" placeholder="Nome" required>
                </div>
                <div class="form-label-group mb-2">
                  <input type="password" name="userpassword" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-label-group mb-2">
                  <input type="password" name="userpassword2" class="form-control" placeholder="Confirmar password" required>
                </div>

                <?php if(isset($erro)){ ?>
                <div class="alert alert-danger" role="alert">
                  <?=$erro;?>
                </div>
                <?php } ?>
                <button class="btn btn-lg btn-dark btn-block text-uppercase " type="submit">Criar conta</button>
                <div class="text-center mb-0 pb-0 pt-3">
                  <a class="" href="index.php">Voltar</a>
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