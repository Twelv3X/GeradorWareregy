<?php

if (isset($_POST['useremail'], $_POST['userpassword']) ) {
    include "connect.php";
    if ($stmt = $con->prepare('SELECT user_email, user_password, user_id, user_nome FROM utilizadores WHERE user_email = ?')) {
	
        $stmt->bind_param('s', $_POST['useremail']);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($email, $password, $id, $nome);
            $stmt->fetch();
            
            if ($_POST['userpassword'] == $password) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $nome;
                $_SESSION['id'] = $id;

                if($_POST["lembrar"] == "1"){

                    
                }
                header('Location: gerar_produtos.php');
            } else {
                $erro = "Palavra-passe incorreta";
            }
        } else {
            $erro = "Email não existe";
        }
    
        $stmt->close();
    }
}

?>