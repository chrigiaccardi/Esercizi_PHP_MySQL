<?php 
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database);

if(!$connessione){
    die("Errore di Connessione:" . $connessione->connect_error);
};

// CREAZIONE DATABASE
// $query_sql = "CREATE DATABASE IF NOT EXISTS db_prova";
// if ($connessione->query($query_sql)) {
//     echo "DB creato con successo";
// } else {
//     echo "Errore nella creazione del db:" . $connessione->error;
// }

// CREAZIONE TABELLA
// $query_sql = "CREATE TABLE persone(
//     id INT NOT NULL AUTO_INCREMENT,
//     nome VARCHAR (50) NOT NULL,
//     cognome VARCHAR (50) NOT NULL,
//     email VARCHAR (50) NOT NULL UNIQUE,

//     PRIMARY KEY(id)
// )";

$query_sql = "INSERT INTO persone (nome, cognome, email) VALUES
('Edoardo', 'Midali', 'edo.mid@example.com')";

if($connessione->query($query_sql)){
    $ultimo_el_inserito = $connessione->insert_id;
    echo "Persone create con successo, il suo id è: " . $ultimo_el_inserito;
} else {
    echo "Errore durante la creazione della Persona: " . $connessione->error;
}


$connessione->close();
?>