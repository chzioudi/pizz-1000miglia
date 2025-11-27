<?php

require_once "config.php";
// Connessione
$conn = new mysqli($host, $user, $password, $dbname);

// Controllo connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera dati dal form in sicurezza
$nome = $conn->real_escape_string($_POST['nome']);
$cognome = $conn->real_escape_string($_POST['cognome']);
$telefono = $conn->real_escape_string($_POST['telefono']);
$email = $conn->real_escape_string($_POST['email']);
$messaggio = $conn->real_escape_string($_POST['messaggio']);
$privacy = isset($_POST['privacy']) ? 1 : 0;

// Inserimento nel database
$sql = "INSERT INTO contatti (nome, cognome, telefono, email, messaggio, privacy) 
        VALUES ('$nome', '$cognome', '$telefono', '$email', '$messaggio', $privacy)";

if ($conn->query($sql) === TRUE) {
    header("Location: grazie.html");
} else {
    echo "Errore: " . $sql . "<br>" . $conn->error;
}

// Chiudi connessione
$conn->close();
?>
