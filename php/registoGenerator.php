<?php

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

function paraSegundos($t){
    list($hours, $minutes) = explode(':', $t, 2);
    $segundos = $minutes * 60 + $hours * 3600;
    return $segundos;
}

function paraHMS($segundos){
    $t = round($segundos);
    return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}

function randomTime($start_time, $end_time){
    $t1 = paraSegundos($start_time);
    $t2 = paraSegundos($end_time);
    $segundos = mt_rand($t1, $t2);
    return $segundos;
}


if(isset($_POST["Generate"])){
  
    for ($i=0; $i < $nEntradas; $i++) {
        
        $rData = randomDate($data1, $data2);
        $sTempo = randomTime($tempo1, $tempo2);
        $rTempo = paraHMS($sTempo);
        $idProduto = mt_rand(1,$nIdProdutos);
        $sqlString = "INSERT INTO produtos_registados
        VALUES ('', " . $idUtilizador . ", " . $idProduto . ", STR_TO_DATE('" . $rData ."', '%d-%m-%Y'), " . $sTempo ."); 
        <br>";

        array_push($sql, $sqlString);

        echo "<br>IdRegisto: ". $i .
        "</br>IdUtilizador: " . $idUtilizador .
        "</br>IdProduto: " . $idProduto .
        "</br>Data: " . $rData .
        "</br>Hora: " . $rTempo . "</br>
        ";
    }
    
//session_unset(); 
//session_destroy();
}


?>
