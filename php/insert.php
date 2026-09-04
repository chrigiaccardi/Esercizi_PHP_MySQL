<?php

require_once('config.php');

// Variabili collegate all'arrivo in modalità POST dei dati
$nome = $connessione->real_escape_string($_POST['nome']);
$cognome = $connessione->real_escape_string($_POST['cognome']);
$email = $connessione->real_escape_string($_POST['email']);

// Statement SQL (Query)
$sql = "INSERT INTO persone (nome, cognome, email) VALUES ('$nome', '$cognome', '$email')";

// Lancio della query
if($connessione->query($sql)){
    // Creiamo il json di ritorno con il messaggio di successo
    $data = [
        "Messaggio" => 'Riga aggiunta con successo',
        "Response" => 1
        ];
    echo json_encode($data);
} else{
    // Creiamo il json di ritorno con il messaggio di errore
    $data = [
        "Messaggio" => $connessione->error,
        "Response" => 0
        ];
    echo json_encode($data);
}

?>