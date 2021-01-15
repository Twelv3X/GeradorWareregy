<?php 
include "connect.php";

    if(isset($_POST["Enviar"])){
        $sql[] = $_POST["sql"];
        $i = 0;
        foreach ($sql as $key) {
            foreach($key as $insert){
                if ($con->query($insert) === TRUE) {
                    $i++;
                } else {
                    echo "Error: " . $insert . "<br>" . $con->error;
                }
            }
        }          

    $con->close();

    }

?>