<?php
require_once "config.php";
$conn = new mysqli($host, $user, $password, $dbname);
if($conn->connect_error) die("Connessione fallita: ".$conn->connect_error);

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM contatti WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: messaggi_ricevuti.php");
exit;
?>
