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

// INSERIMENTO DATI PREPARE & EXECUTE
// $sql = "INSERT INTO persone (nome, cognome, email) VALUES (?,?,?)";
// if ($statement = $connessione->prepare($sql)) {
//     $statement->bind_param("sss", $nome, $cognome, $email);
//     $nome = $_POST['nome'];
//     $cognome = $_POST['cognome'];
//     $email = $_POST['email'];
//     $statement->execute();
//     echo "Record inseriti con successo";
// }else {
//     echo "Errore: non possiamo eseguire la query" . $connessione->error;
// }
//$statement->close();

// VISUALIZZAZIONE DATI IN UNA TABELLA
// $query_select = "SELECT * FROM persone ORDER BY id DESC";
// if ($result = $connessione->query($query_select)) {
//     if ($result->num_rows > 0) {
//         echo '
//             <table>
//                 <thead>
//                     <tr>
//                         <th>ID</th>
//                         <th>Nome</th>
//                         <th>Cognome</th>
//                         <th>Email</th>
//                     </tr>
//                 </thead><tbody>';
//         while ($row = $result->fetch_array()) {
//             echo '
//                     <tr>
//                         <td>' . $row['id'] . '</td>
//                         <td>' . $row['nome'] . '</td>
//                         <td>' . $row['cognome'] . '</td>
//                         <td>' . $row['email'] . '</td>
//                     </tr>
//             ';
//         }
//         echo '</tbody></table>';
//     } else {
//         echo "Non ci sono righe per questa query";
//     }
    
// } else {
//     echo "Errore nel SELECT: " . $connessione->error;
// }

$query_update = "UPDATE persone SET email = 'edoardo.midali1995@gmoail.com' WHERE id = '6'";
$query_delete = "DELETE FROM persone WHERE id = 6";
if ($connessione->query($query_delete)) {
    echo "Persona Eliminata con successo";
}else {
    echo "errore nella eliminazione della persona";
}


$connessione->close();
?>
