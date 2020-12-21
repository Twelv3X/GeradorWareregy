<?php

function getRandNome($nomes){
return $nomes[rand(0,count($nomes)-1)];
}

function getRandLoc($locs){
    return $locs[rand(0,count($locs)-1)];
    }

function getRandPeso($peso1, $peso2){
return rand($peso1, $peso2);
}

function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('d-m-Y', $val);
}

if(isset($_POST["Generate"])){
    $nomes = $_SESSION["nomeProds"];
    $locs = $_SESSION["locProds"];
  
    for ($i=0; $i < $nEntradas; $i++) {
        $pNome = getRandNome($nomes,$nEntradas);
        $pPeso = getRandPeso($peso1, $peso2);
        $pLoc = getRandLoc($locs,$nEntradas);
        $pData = randomDate($data1, $data2);

        $sqlString= "INSERT INTO registos
        VALUES ('', codBarras, " . $pNome . ", " . $pPeso . ", " . $pLoc . ", " . $pData .", " . $idUtilizador . "); 
        <br>";
        
        array_push($sql, $sqlString);

        echo"
            ID: ". $i ."<br>
            Nome: " . $pNome . "<br>
            Peso: " . $pPeso . "<br>
            Localização: " . $pLoc  . "<br>
            <br>
        ";
    }
    
//session_unset(); 
//session_destroy();
}


?>
