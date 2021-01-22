<?php

//Retorna uma data aleatória entre 2 duas
function randomDate($start_date, $end_date){

    $min = strtotime($start_date);
    $max = strtotime($end_date);
    $val = rand($min, $max);

    return date('d-m-Y', $val);
}

//Passa uma hora no formato de H:M:S em segundos
function paraSegundos($t){
    list($hours, $minutes) = explode(':', $t, 2);
    $segundos = $minutes * 60 + $hours * 3600;
    return $segundos;
}

//Passa um número de segundos em uma hora no formato de H:M:S
function paraHMS($segundos){
    $t = round($segundos);
    return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}

//Retorna uma hora aleatória entre 2 horas
//Recebe 2 horas no formato de H:M:S, passa essas horas para segundos e então retorna uma hora em segundos dentro dessas 2 horas
function randomTime($start_time, $end_time){
    $t1 = paraSegundos($start_time);
    $t2 = paraSegundos($end_time);
    $segundos = mt_rand($t1, $t2);
    return $segundos;
}


if(isset($_POST["Generate"])){
  
    for ($i=0; $i < $nEntradas; $i++) {
        
        $rData = randomDate($data1, $data2);
        $sTempo = randomTime($tempo1, $tempo2); //hora aleatória em segundos
        $rTempo = paraHMS($sTempo); //Passa os segundos devolta para H:M:S
        //Gerar um id entre 1 e o número máximo do id escolhido
        $idProduto = mt_rand(1,$nIdProdutos);
        $sqlString = 'INSERT INTO produtos_registados
        VALUES ("", ' . $idUtilizador . ', ' . $idProduto . ', STR_TO_DATE("' . $rData .'", "%d-%m-%Y"), ' . $sTempo .');';

        //Guarda a variável com as strings dos inserts gerados dentro de um array para mais tarde serem usados para 
        //serem enviados para a base de dados
        array_push($sql, $sqlString);

        //Texto que aparece no "pré-visualizar"
        echo "<br>IdRegisto: ". $i .
        "</br>IdUtilizador: " . $idUtilizador .
        "</br>IdProduto: " . $idProduto .
        "</br>Data: " . $rData .
        "</br>Hora: " . $rTempo . "</br>
        ";
    }
}


?>
