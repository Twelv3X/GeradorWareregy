<?php 
include "connect.php";

    //Vai inserir na base de dados todas as strings dos inserts que foram guardados no array
    //Este código é chamado em ambos gerar_produtos.php e gerar_registos.php para reutilziador código
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

    //O input type week (suportado apenas pelo o chrome) retorna a semana e ano no formato de 2021-W01 (primeira semana de janeiro)
    //Neste código pega na variavel retornada pelo o POST e separa a semana e o ano em strings diferentes, removendo o "-W" 
    if(isset($_POST["graf"])){
        $tempo =  $_POST["semana"];
        $tempo = explode ("-" , $tempo);
        $semana =str_replace("W", "",$tempo[1]);
        $ano = $tempo[0];
        include "connect.php";
        $entrada = "";
        
        //Esta query vai buscar os registos da semana e ano escolhido e agrupa o número de registos para cada dia dessa semana
        if ($stmt = $con->prepare("SELECT registo_data, count(*) as total FROM `produtos_registados` WHERE week(registo_data) = ? and year(registo_data) = ? group by day(registo_data);")) {
        
            $stmt->bind_param("ii", $semana,$ano);
            $stmt->execute();
            $res = $stmt->get_result();
            while($row = $res->fetch_assoc()){
                $entrada .= "['".$row{'registo_data'}."',".$row{'total'}."],";
            }
            $stmt->close();
        } else {
          echo "0 resultados";
        }
        
        }

        

?>