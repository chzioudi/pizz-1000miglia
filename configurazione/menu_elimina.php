<?php
require_once "config.php";
$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Connessione fallita: ".$conn->connect_error);
}

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

 
    $stmt = $conn->prepare("SELECT foto FROM menu WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $menu = $result->fetch_assoc();
    $stmt->close();

    if($menu){
        // Elimina immagine dal server se esiste
        if(file_exists($menu['foto'])){
            unlink($menu['foto']);
        }

        // Elimina voce dal DB
        $stmt = $conn->prepare("DELETE FROM menu WHERE id=?");
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            header("Location: menu_lista.php?msg=eliminato");
            exit;
        } else {
            echo "Errore: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Voce non trovata.";
    }
} else {
    echo "ID mancante.";
}
?>
