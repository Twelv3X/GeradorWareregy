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

    if(isset($_POST["graf"])){
        $tempo =  $_POST["semana"];
        $tempo = explode ("-" , $tempo);
        $semana =str_replace("W", "",$tempo[1]);
        $ano = $tempo[0];
        include "connect.php";
        $entrada = "";
        if ($stmt = $con->prepare("SELECT registo_data, count(*) as total FROM `produtos_registados` WHERE week(registo_data) = ? and year(registo_data) = ? group by day(registo_data);")) {
        
            $stmt->bind_param("ii", $semana,$ano);
            $stmt->execute();
            $res = $stmt->get_result();
            while($row = $res->fetch_assoc()){
                $entrada .= "['".$row{'registo_data'}."',".$row{'total'}."],";
            }
            $stmt->close();
        } else {
          echo "0 results";
        }
        
        }

        

?>