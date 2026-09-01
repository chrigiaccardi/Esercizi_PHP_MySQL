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
// $query_sql_create = "CREATE TABLE persone(
//     id INT NOT NULL AUTO_INCREMENT,
//     nome VARCHAR (50) NOT NULL,
//     cognome VARCHAR (50) NOT NULL,
//     email VARCHAR (50) NOT NULL UNIQUE,

//     PRIMARY KEY(id)
// )";

// INSERIMENTO DATI TRAMITE FORM
// $nome = $connessione->real_escape_string($_POST['nome']);
// $cognome = $connessione->real_escape_string($_POST['cognome']);
// $email = $connessione->real_escape_string($_POST['email']);

// $query_sql_insert = "INSERT INTO persone (nome, cognome, email) VALUES
// ('$nome', '$cognome', '$email')";

// if($connessione->query($query_sql_insert)){
//     echo "Persone create con successo";
// } else {
//     echo "Errore durante la creazione della Persona: " . $connessione->error;
// }

$sql = "INSERT INTO persone (nome, cognome, email) VALUES (?,?,?)";

if ($statement = $connessione->prepare($sql)) {
    $statement->bind_param("sss", $nome, $cognome, $email);

    $nome = "Leonardo";
    $nome = "Giobbe";
    $nome = "giobbe.luca@example.com";
    $statement->execute();

    $nome = "Giacomo";
    $nome = "Dacomo";
    $nome = "giacomo.puzzina@example.com";
    $statement->execute();

    echo "Record inseriti con successo";
}else {
    echo "Errore: non possiamo eseguire la query: $sql. " . $connessione->error;
}

$connessione->close();
?>
