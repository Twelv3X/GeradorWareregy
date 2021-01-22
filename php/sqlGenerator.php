<?php
//Texto que aparece na caixa do "Código SQL"
if(isset($_POST["Generate"])){
    
    foreach ($sql as $key) {
        echo $key;
        echo "</br>";
        echo "</br>";
    }
}
?>