<?php

function getRandNome($nomes){
return $nomes[mt_rand(0,count($nomes)-1)];
}

function getRandLoc($locs){
    return $locs[mt_rand(0,count($locs)-1)];
    }

function getRandPeso($peso1, $peso2){
$randFloat = mt_rand(0, 10) / 10;
$randpeso = mt_rand($peso1, $peso2);
    return $randpeso + $randFloat;
}


if(isset($_POST["Generate"])){
    $nomes = $_SESSION["nomeProds"];
    $locs = $_SESSION["locProds"];
  
    for ($i=0; $i < $nEntradas; $i++) {
        $pNome = getRandNome($nomes,$nEntradas);
        $pPeso = getRandPeso($peso1, $peso2);
        $pLoc = getRandLoc($locs,$nEntradas);
        $qr = "'Id: ". $i .
                " Nome: " . $pNome .
                " Peso: " . $pPeso .
                " Localização: " . $pLoc . "'";   

        $sqlString = "INSERT INTO registos
        VALUES ('', " . $pNome . ", " . $pPeso . ", " . $pLoc . ", " . $qr ."); 
        <br>";
        
        array_push($sql, $sqlString);

        echo "Id: ". $i .
        "</br>Nome: " . $pNome .
        "</br>Peso: " . $pPeso .
        "</br>Localização: " . $pLoc . "</br>
        </br>";
    }
    
//session_unset(); 
//session_destroy();
}


?>
