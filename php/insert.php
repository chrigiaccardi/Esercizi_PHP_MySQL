<?php

require_once('config.php');

$nome = '';
$cognome = '';
$email = '';

$sql = "INSERT INTO persone (nome, cognome, email) VALUES ($nome, $cognome, $email)";

?>