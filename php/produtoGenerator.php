<?php

//Retorna um nome aleatório entre os nomes guardos num array que vêm do formulário
function getRandNome($nomes){
return $nomes[mt_rand(0,count($nomes)-1)];
}

//Retorna uma localização aleatória entre os localizações guardadas num array que vêm do formulário
function getRandLoc($locs){
    return $locs[mt_rand(0,count($locs)-1)];
    }

//Retorna um número décimal aleatório entre 2 números inteiros
function getRandPeso($peso1, $peso2){
$randFloat = mt_rand(0, 10) / 10;
$randpeso = mt_rand($peso1, $peso2);
    return $randpeso + $randFloat;
}


if(isset($_POST["Generate"])){
    //O formulário envia para a sessão os nomes e as localizações inseridas, aqui passo esses dados para um array
    $nomes = $_SESSION["nomeProds"];
    $locs = $_SESSION["locProds"];
  
    //Código que vai gerar um certo número de produtos
    for ($i=0; $i < $nEntradas; $i++) {
        $pNome = getRandNome($nomes,$nEntradas);
        $pPeso = getRandPeso($peso1, $peso2);
        $pLoc = getRandLoc($locs,$nEntradas);
        $qr = '"Id: '. $i .
                ' Nome: ' . $pNome .
                ' Peso: ' . $pPeso .
                ' Localização: ' . $pLoc . '"';   

        $sqlString = 'INSERT INTO produtos
        VALUES ("", "' . $pNome . '", ' . $pPeso . ', "' . $pLoc . '", ' . $qr .');';
        
        //Guarda a variável com as strings dos inserts gerados dentro de um array para mais tarde serem usados para 
        //serem enviados para a base de dados
        array_push($sql, $sqlString);

        //Texto que aparece no "Pré-visualizar"
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
