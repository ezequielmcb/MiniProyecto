<?php

try{
    $mysqli = new mysqli("localhost", "root", "", "authentication");
}catch(mysqli_sql_exception $error) {
    echo "ERROR DE CODIGO ". $error->getMessage();
}