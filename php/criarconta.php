<?php
if(isset($_POST["useremail"], $_POST["usernome"],$_POST['userpassword'])){
    if ($_POST['userpassword'] == $_POST['userpassword2']) {

        $email = $_POST["useremail"];
        $usernome = $_POST["usernome"];
        $userpassword = $_POST["userpassword"];

        include "connect.php";

        if ($con->query("INSERT INTO utilizadores (user_nome, user_email, user_password) VALUES('$usernome','$email','$userpassword')")) {
        $con->close();
                     
            header('Location: index.php');

        } else {
            $erro = "Erro na conexão";
        }
    } else {
        $erro = "Password não condiz";
    }
}
?>