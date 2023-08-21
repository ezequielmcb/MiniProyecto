<?php 
if($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["correo"] !== "" && $_POST["contrasena"] !== ""){
    require_once("connect.php");
    $correo = $_POST["correo"];
    $pass = $_POST["contrasena"];

    try{
        $statement = $mysqli->query("SELECT * FROM usuario WHERE email='$correo';");
        if ($statement->num_rows === 1) {
            $data = $statement->fetch_assoc();

            if (password_hash($contrasena, $data["pssword"])) {
                session_start();
                $_SESSION["user_data"] = $data;

                header("location: ../views/perfil.php");
            }else{
                echo "Las credenciales no coinciden";
            }
 
        } else {
            echo "No existe un usuario con esos datos";
        }

    } catch (mysqli_sql_exception $e) {
        echo "Error " . $e->getMessage();
    }
} else {

    echo "No se cumplen las condiciones para hacer la corroboraacion de los datos de inicio de sesion";
}