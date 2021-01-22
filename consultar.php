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
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header>
<?php
include "navbar.php";
?>
</header>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 contentor bg-light p-4 mt-4">
            <h2 class="mb-4">Consultar</h2>
        <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Peso</th>
                <th>Localização</th>
                <th>Hora</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
        <!-- Preencher a tabela com registos -->
        <?php include "php/datatable.php"; ?>
        </tbody>
        </table>
        </div>
    </div>
    
</div>
</body>
<!-- 
Como existem milhares de registos, a página iria ficar com um scroll enorme,
para prevenir isso usei um plugin de jQuery chamado DataTables.
Este plugin vai paginar a tabela e vai também incluir um form de search no topo da tabela
-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</html>