<?php
if(!isset($_SESSION["nomeProds"])){
    $_SESSION["nomeProds"] = array();
}

if(!isset($_SESSION["locProds"])){
    $_SESSION["locProds"] = array();
}

if(isset($_POST["nomeProduto"]))
{
    $nomeProduto = $_POST["nomeProduto"];
}

if(isset($_POST["addProd"]))
{
    array_push($_SESSION["nomeProds"], $_POST["nomeProduto"]);
}

if(isset($_POST["removeProd"]))
{
    $_SESSION["nomeProds"] = array();
}


if(isset($_POST["addLoc"]))
{
    array_push($_SESSION["locProds"], $_POST["locProduto"]);
}

if(isset($_POST["removeLoc"]))
{
    $_SESSION["locProds"] = array();
}

if(isset($_POST["Generate"]))
{
     
}

if(isset($_POST["nEntradas"]))
{
    $nEntradas = $_POST["nEntradas"];
}else{
    $nEntradas = "";
}

if(isset($_POST["nIdProdutos"]))
{
    $nIdProdutos = $_POST["nIdProdutos"];
}else{
    $nIdProdutos = "";
}

if(isset($_POST["nomeProduto"]))
{
    $prod = $_POST["nomeProduto"];
}else{
    $prod = "";
}

if(isset($_POST["Peso1"]))
{
    $peso1 = $_POST["Peso1"];
}else{
    $peso1 = "";
}

if(isset($_POST["Peso2"]))
{
    $peso2 = $_POST["Peso2"];
}else{
    $peso2 = "";
}

if(isset($_POST["locProduto"]))
{
    $locProduto = $_POST["locProduto"];
}else{
    $locProduto = "";
}

if(isset($_POST["data1"]) && isset($_POST["data2"]) )
{
    $data1 = $_POST["data1"];
    $data2 = $_POST["data2"];
}else{
    $data1 = "";
    $data2 = "";
}

if(isset($_POST["tempo1"]) && isset($_POST["tempo2"]) )
{
    $tempo1 = $_POST["tempo1"];
    $tempo2 = $_POST["tempo2"];
}else{
    $tempo1 = "";
    $tempo2 = "";
}

if(isset($_POST["idUtilizador"]))
{
    $idUtilizador = $_POST["idUtilizador"];
}else{
    $idUtilizador = "";
}

if(!isset($sql)){
$sql = array();
}


?>