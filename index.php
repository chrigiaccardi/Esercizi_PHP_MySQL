<?php 
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione === false){
    die("Errore di Connessione:" . $connessione->connect_error);
};

echo "Connessione avvenuta con successo:" . $connessione->host_info;

$connessione->close();
?>