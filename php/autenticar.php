<?php
//Verificar se os campos estão preenchidos
if (isset($_POST['useremail'], $_POST['userpassword']) ) {
    include "connect.php";
    if ($stmt = $con->prepare('SELECT user_email, user_password, user_id, user_nome FROM utilizadores WHERE user_email = ?')) {
	
        $stmt->bind_param('s', $_POST['useremail']);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($email, $password, $id, $nome);
            $stmt->fetch();
            //Verificar password
            if ($_POST['userpassword'] == $password) {
                //Criar sessão
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $nome;
                $_SESSION['id'] = $id;

                //Lembrar palavra-passe com cookies
                if( ($_POST["lembrar"]==1) || ($_POST["lembrar"]=="on")) {
                    $hour = time()+3600 *24 * 30;
                    setcookie("userid", $id, $hour);
                    setcookie("username", $nome, $hour);
                    }
                    
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
?>