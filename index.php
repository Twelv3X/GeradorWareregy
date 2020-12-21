<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Document</title>
</head>

<?php
include "variaveis.php";

?>

<body class="m-2">
    <h1 class="m-4">Gerador Aleatório de Código de Barras</h1>
<div class="row">
    <div class="col-md-5">
        <form class="container-fluid" action="index.php" method="POST">

            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label" for="nEntradas">Quantidade de códigos de barras</label>
                    <input required class="form-control" type="number" name="nEntradas" value="<?=$nEntradas;?>">
                </div>
            </div>
            <div class="row mb-3">        
                <div class="col-md-8">
                    <label class="form-label" for="">Nomes possíveis dos produtos</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="nomeProduto">
                        <input class="btn btn-primary" name="addProd" type="submit" value="Adicionar">
                        <input class="btn btn-secondary" name="removeProd" type="submit" value="Limpar">
                    </div>
                    <div class="form-text"><?= "Número de Nomes: " . count($_SESSION["nomeProds"]) ?></div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
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

            <div class="row mb-3">        
                <div class="col-md-8">
                    <label class="form-label" for="">Localizações possíveis dos produtos</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="locProduto">
                        <input class="btn btn-primary" name="addLoc" type="submit" value="Adicionar">
                        <input class="btn btn-secondary" name="removeLoc" type="submit" value="Limpar">
                    </div>
                    <div class="form-text"><?= "Número de localizações: " . count($_SESSION["locProds"]) ?></div>
                </div>
            </div>
            <h2 class="my-4">Dados de Registo para a Base de Dados</h2>
            <div class="row mb-3">
                <div class="col-md-8">
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
            
            <div class="row mb-3">
                <div class="col-md-8">
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

            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label" for="nEntradas">Id do utilizador</label>
                    <input class="form-control" type="number" name="idUtilizador" value="<?=$idUtilizador;?>">
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <input class="btn btn-primary" type="submit" name="Generate" value="Generate">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3 ">
        <h2>String</h2>
        <div class="col-md-12 bg-light overflow-scroll" style="max-height: 640px;">
            <?php
                include "stringGenerator.php";
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <h2>SQL</h2>
        <div class="col-md-12 bg-light overflow-scroll" style="max-height: 640px;">
            <?php
               include "sqlGenerator.php";
            ?>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>