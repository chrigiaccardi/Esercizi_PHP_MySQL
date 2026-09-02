<?php

require_once('config.php');

$sql = 'SELECT * FROM persone';

if($result = $connessione->query($sql)){
    $data = [];
    if ($result->num_rows > 0) {
        // MYSQLI_ASSOC -> specifica che vogliamo un array associativo per il risultato che arriva
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $tmp; // $tmp sta per un dato temporaneo
            $tmp['id'] = $row['id'];
            $tmp['nome'] = $row['nome'];
            $tmp['cognome'] = $row['cognome'];
            $tmp['email'] = $row['email'];
            array_push($data, $tmp);
        }
        echo json_encode($data);
    }else {
        echo json_encode($data);
        echo "Non ci sono righe disponibili";
    }
} else{
    echo "Errore nell'esecuzione di $sql. " . $connessione->connect_error;
}

?>