<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["correo"] !== "" && $_POST["contrasena"] !== "") {
    $correo = $_POST["correo"];
    $pass = $_POST["contrasena"];

    try{
        require_once("connect.php");
        $hashPass = password_hash($pass, PASSWORD_DEFAULT);

        $result = $mysqli->query("INSERT INTO usuario(email, psswrd) VALUES ('$correo', '$hashPass');");

        if($result){
            $newData = $mysqli->query("SELECT * FROM usuario WHERE email='$correo'");
            if($newData->num_rows === 1 ){
                $data = $newData->fetch_assoc();
                session_start();
                $_SESSION["user_data"] = $data;
                header("location: ../views/perfil.php");
            }
        }
        
    }catch (mysqli_sql_exception $error){
        echo "ERROR # " . $error->getMessage();
    }
}else{
    echo "No estas accediendo por el metodo post";
}
    
