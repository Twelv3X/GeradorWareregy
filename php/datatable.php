<?php
include "connect.php";
//Buscar todos os produtos registados
$sql = 'SELECT produto_id, produto_nome, produto_peso, produto_loc, SEC_TO_TIME(registo_hora)as registo_hora, DATE_FORMAT(registo_data,"%d/%m/%Y") as registo_data FROM produtos_registados natural join produtos;';
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // Preenche a tabela com os dados da base de dados, jquery então automáticamente pagina a tabela pois existem milhares de registos
  while($row = $result->fetch_assoc()) {?>
    <tr>
                <td><?=$row["produto_id"];?></td>
                <td><?=$row["produto_nome"];?></td>
                <td><?=$row["produto_peso"];?></td>
                <td><?=$row["produto_loc"];?></td>
                <td><?=$row["registo_hora"];?></td>
                <td><?=$row["registo_data"];?></td>
            </tr>
  <?php }
}

$con->close();
?>