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
include "php/queries.php";
include "navbar.php";
?>
</header>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 contentor bg-light p-4 mt-4">
       
            <form class="mb-4" method="POST" action="estatisticas.php" >
                <div class="row">
                    <div class="col-md-4">
                        <h2 style="display: inline-block;">Estatísticas</h2>
                    </div>
                    
                        <div class="col-md-4 offset-md-2">
                            <input class="form-control" type="week" name="semana" id="">
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-dark" type="submit" name="graf" value="Procurar">
                        </div>
                   
                </div>
            </form> 
            <div class="" id="top_x_div" style="width: 100%; height: 600px;">
        </div>
    </div>
    
</div>
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
var data = new google.visualization.arrayToDataTable([
    ['Data', 'n Registos'],
    <?php echo $entrada ?>
]);

var options = {
    legend: { position: 'none' },
    chart: {
    title: '',
    subtitle: '' },
    axes: {
    x: {
        0: { side: 'top', label: ''} // Top x-axis.
    }
    },
    bar: { groupWidth: "90%" }
};

var chart = new google.charts.Bar(document.getElementById('top_x_div'));
// Convert the Classic options to Material options.
chart.draw(data, google.charts.Bar.convertOptions(options));
};
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</html>