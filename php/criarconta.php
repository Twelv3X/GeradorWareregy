<?php
//Verificar se todos os campos foram preenchidos
if(isset($_POST["useremail"], $_POST["usernome"],$_POST['userpassword'], $_POST["userpassword2"])){
    //Passar os campos para variáveis
    $email = $_POST["useremail"];
    $usernome = $_POST["usernome"];
    $userpassword = $_POST["userpassword"];
    $userpassword2 = $_POST["userpassword2"];

    //Verificar o tamanho da palavra-passe
    if(strlen($userpassword) > 6){
        if ($userpassword == $userpassword2) {
            include "connect.php";

            if ($con->query("INSERT INTO utilizadores (user_nome, user_email, user_password) VALUES('$usernome','$email','$userpassword')")) {
            $con->close();
                        
                header('Location: index.php');

            } else {
                $erro = "Email já existe"; //A unica forma de a query dar erro é por erro de conexão ou se o email for repetido pois ele na tabela SQL é UNIQUE
            }
        } else {
            $erro = "Password não condiz";
        }
    }else{
        $erro = "Password demasiado curta";
    }
}
?>