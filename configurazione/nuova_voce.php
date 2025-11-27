<?php 
require_once "config.php";
$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Connessione fallita: ".$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $tipo = $_POST["tipo"];
    $nome = $_POST["nome"];
    $prezzo = $_POST["prezzo"];

    if(isset($_FILES["foto"]) && $_FILES["foto"]["error"]==0){
        $targetDir = "uploads";
        $filesname = time() . "_" . basename($_FILES['foto']['name']);
        $targetfiles = $targetDir . "/" . $filesname;
        $filetype = strtolower(pathinfo($targetfiles, PATHINFO_EXTENSION));

        $allowed = ['jpg','jpeg','gif','png'];

        if(in_array($filetype, $allowed)){
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $targetfiles)){
                $stmt = $conn->prepare("INSERT INTO menu (tipo, nome, prezzo, foto) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssds", $tipo, $nome, $prezzo, $targetfiles);
                if($stmt->execute()) echo ($tipo." aggiunto con successo");
                else echo("Errore: ".$stmt->error);
                $stmt->close();
            } else {
                echo "<p style='color:red;'>Errore caricamento immagine.</p>";
            } 
        } else echo "<p style='color:red;'>Formato immagine non consentito.</p>";
    } else echo "<p style='color:red;'>Nessuna immagine caricata.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="../img/logo-1.png" type="image/x-icon">
     <link rel="stylesheet" href="../css/style2.css">
     <link rel="stylesheet" href="../css/reset.css">
    <title>Nuovo menu</title>
</head>
<body>
    <?php require_once "../include/menu_config.php" ?>
    <div >
        <h2>Aggiungi voce al menu</h2>
    </div>
    <div class="nuova_voce"> 
      
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <label for="tipo">Categoria:</label><br>
          <select name="tipo" id="tipo" required>
            <option value="">Seleziona</option>
            <option value="pizza">Pizza</option>
            <option value="hamburger">Hamburger</option>
            <option value="dolce">Dolce</option>
            <option value="bevanda">Bevanda</option>
        </select>
    </div>
    <div class="form-row">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" required>
    </div>
    <div class="form-row">
        <label for="prezzo">Prezzo (€):</label><br>
        <input type="number" name="prezzo" id="prezzo" step="0.01" required>
    </div>
    <div class="form-row">
         
    <label for="foto">Foto:</label><br>
    <input type="file" name="foto" id="foto" accept="image/*" required>
    </div>
    <button type="submit">Aggiungi  + </button>
</form>

</div>

</body>
</html>
