<?php

require_once('config.php');

$sql = 'SELECT * FROM persone';

if($result = $connessione->query($sql)){
    $data = [];
    if ($result->num_rows > 0) {
        // MYSQLI_ASSOC -> specifica che vogliamo un array associativo per il risultato che arriva
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            // $tmp = temporaneo: dati temporanei e li associamo ai valori del record
            $tmp;
            $tmp['id'] = $row['id'];
            $tmp['nome'] = $row['nome'];
            $tmp['cognome'] = $row['cognome'];
            $tmp['email'] = $row['email'];
            // Il dato temporaneo viene pushato all'interno dell'array data.
            array_push($data, $tmp);
        }
        // Trasforma $data in json e lo manda indietro al frontend
        echo json_encode($data);
    }else {
        // Trasforma data in json e rimanda l'array vuoto
        echo json_encode($data);
        echo "Non ci sono righe disponibili";
    }
} else{
    echo "Errore nell'esecuzione di $sql. " . $connessione->connect_error;
}

?>