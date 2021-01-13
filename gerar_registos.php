<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if(isset($_COOKIE["username"])) $user = $_COOKIE["username"];
if (isset($_SESSION["name"])) $user = $_SESSION["name"];

if (!isset($user)) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
<header>
<?php
include "php/variaveis.php";
include "navbar.php";
?>
</header>
    
<div class="row mx-4">
    <div class="col-md-4 contentor bg-light py-4 mt-4">
        <form class="container-fluid" action="gerar_registos.php" method="POST">

            <div class="row mb-2 justify-content-center">
                <div class="col-md-12">
                <h2 class="text-center mb-3">Gerar Registos</h2>
                    <label class="form-label" for="nEntradas">Quantidade de Registos</label>
                    <input required class="form-control" type="number" name="nEntradas" value="<?=$nEntradas;?>">
                </div>
            </div>
           
            <div class="row mb-2 justify-content-center">
                <div class="col-md-12">
                    <label class="form-label" for="">Intervalo das Datas</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="date" name="data1" value="<?=$data1;?>">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="date" name="data2" value="<?=$data2;?>">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mb-2 justify-content-center">
                <div class="col-md-12">
                    <label class="form-label" for="">Intervalo do Tempo</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="time" name="tempo1" value="<?=$tempo1;?>">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="time" name="tempo2" value="<?=$tempo2;?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2 justify-content-center">
                <div class="col-md-12">
                    <label class="form-label" >Id do utilizador</label>
                    <input class="form-control" type="number" name="idUtilizador" value="<?=$idUtilizador;?>">
                </div>
            </div>

            <div class="row mb-2 justify-content-center">
                <div class="col-md-12">
                    <label class="form-label" >Número de Produtos</label>
                    <input class="form-control" type="number" name="nIdProdutos" value="<?=$nIdProdutos;?>">
                </div>
            </div>

            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <input class="btn btn-dark" type="submit" name="Generate" value="Generate">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6 offset-md-1 contentor bg-light py-4 mt-4">
        <div class="row">
    <div class="col-md-6">
        <h2 class="text-center">Pré-visualizar</h2>
        <div class="col-md-12 bg-white overflow-scroll" style="max-height: 448px;">
            <?php
                include "php/registoGenerator.php";
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <h2 class="text-center">Código SQL</h2>
        <div class="col-md-12 bg-white overflow-scroll" style="max-height: 448px;">
            <?php
               include "php/sqlGenerator.php";
            ?>
        </div>
    </div>
</div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>