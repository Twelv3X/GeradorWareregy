<?php
session_start();

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
include  "php/queries.php";
include "php/variaveis.php";
include "navbar.php";
?>
</header>
    
<div class="row mx-4 justify-content-center">
    <div class="col-md-4 contentor bg-light py-4 mt-4">
        <form class="container-fluid" action="gerar_produtos.php" method="POST">

            <div class="row mb-2 justify-content-center">
                <div class="col-md-12">
                <h2 class="text-center mb-3">Gerar Produtos</h2>
                    <label class="form-label" for="nEntradas">Quantidade de Produtos</label>
                    <input required class="form-control" type="number" name="nEntradas" value="<?=$nEntradas;?>">
                </div>
            </div>
            <div class="row mb-2 justify-content-center">        
                <div class="col-md-12">
                    <label class="form-label" for="">Nomes possíveis dos produtos</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="nomeProduto">
                        <input class="btn btn-dark" name="addProd" type="submit" value="Adicionar">
                        <input class="btn btn-secondary" name="removeProd" type="submit" value="Limpar">
                    </div>
                    <div class="form-text"><?= "Número de Nomes: " . count($_SESSION["nomeProds"]) ?></div>
                </div>
            </div>

            <div class="row mb-2 justify-content-center">
                <div class="col-md-12">
                    <label class="form-label" for="">Intervalo do Peso</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input required class="form-control" type="number" name="Peso1" placeholder="min" value=<?=$peso1;?>>
                        </div>
                        <div class="col-md-6">
                            <input required class="form-control" type="number" name="Peso2" placeholder="max" value=<?=$peso2;?>>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2 justify-content-center">        
                <div class="col-md-12">
                    <label class="form-label" for="">Localizações possíveis dos produtos</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="locProduto">
                        <input class="btn btn-dark" name="addLoc" type="submit" value="Adicionar">
                        <input class="btn btn-secondary" name="removeLoc" type="submit" value="Limpar">
                    </div>
                    <div class="form-text"><?= "Número de localizações: " . count($_SESSION["locProds"]) ?></div>
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
        <div class="row" style="max-height: 448px; height: 100%">
            <div class="col-md-6" >
                <h2 class="text-center">Pré-visualizar</h2>
                <div class="col-md-12 bg-white overflow-scroll" style="max-height: 368px; height: 100%;">
                     <?php
                        include "php/produtoGenerator.php";
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Código SQL</h2>
                <div class="col-md-12 bg-white overflow-scroll" style="max-height: 368px; height: 100%;">
                    <?php
                    if(isset($_POST["Enviar"])){
                        echo "Enviado " . $i . " produtos!";
                    }
                        include "php/sqlGenerator.php";
                    ?>
            </div>
            <?php if(isset($_POST["Generate"])){?>
                <div class="col-md-8 offset-md-2">
                    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <?php foreach($sql as $key) { ?>
                                <input type="hidden" name="sql[]" value='<?=$key?>'>
                                
                            <?php } ?>
                            
                            <input class="btn btn-dark mt-2" type="submit" name="Enviar" value="Enviar para a base de dados">
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</html>