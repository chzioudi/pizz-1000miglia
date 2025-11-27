<?php
require_once "config.php";
$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Connessione fallita: ".$conn->connect_error);
}

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    // Recupera dati esistenti
    $stmt = $conn->prepare("SELECT * FROM menu WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $menu = $result->fetch_assoc();
    $stmt->close();

    if(!$menu){
        die("Voce non trovata!");
    }

    // Aggiorna
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $tipo = $_POST["tipo"];
        $nome = $_POST["nome"];
        $prezzo = floatval($_POST["prezzo"]);
        $foto = $menu['foto'];

        if(isset($_FILES["foto"]) && $_FILES["foto"]["error"]==0){
            $targetDir = "uploads";
            $filesname = time() . "_" . basename($_FILES['foto']['name']);
            $targetfiles = $targetDir . "/" . $filesname;
            $filetype = strtolower(pathinfo($targetfiles, PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','gif','png'];

            if(in_array($filetype, $allowed)){
                move_uploaded_file($_FILES['foto']['tmp_name'], $targetfiles);
                $foto = $targetfiles;
            }
        }

        $stmt = $conn->prepare("UPDATE menu SET tipo=?, nome=?, prezzo=?, foto=? WHERE id=?");
        $stmt->bind_param("ssdsi", $tipo, $nome, $prezzo, $foto, $id);

        if($stmt->execute()){
            echo "<p style='color:green;'>Voce aggiornata con successo!</p>";
        } else {
            echo "<p style='color:red;'>Errore: ".$stmt->error."</p>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modifica Voce Menu</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="shortcut icon" href="../img/logo-1.png" type="image/x-icon">
</head>
<body>
     <?php require_once "../include/menu_config.php" ?>
    <div>
         <h2>Modifica Voci </h2>
</div>
<div class="nuova_voce">

    <form action="" method="post" enctype="multipart/form-data">
        <label>Categoria:</label>
        <select name="tipo" required>
            <option value="pizza" <?= $menu['tipo']=='pizza' ? 'selected' : '' ?>>Pizza</option>
            <option value="hamburger" <?= $menu['tipo']=='hamburger' ? 'selected' : '' ?>>Hamburger</option>
            <option value="dolce" <?= $menu['tipo']=='dolce' ? 'selected' : '' ?>>Dolce</option>
            <option value="bevanda" <?= $menu['tipo']=='bevanda' ? 'selected' : '' ?>>Bevanda</option>
        </select>
        <br><br>
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($menu['nome']) ?>" required>
        <br><br>
        <label>Prezzo (€):</label>
        <input type="number" name="prezzo" step="0.01" value="<?= $menu['prezzo'] ?>" required>
        <br><br>
        <label>Foto attuale:</label><br>
        <img src="<?= $menu['foto'] ?>" width="100"><br>
        <input type="file" name="foto" accept="image/*">
        <br><br>
        <button type="submit">💾 Salva modifiche</button>
    </form>
</div>
</body>
</html>
