<?php 
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
require_once "config.php";
$conn = new mysqli($host, $user, $password, $dbname);
if($conn->connect_error){
    die("Connessione fallita: ".$conn->connect_error);
}


if(isset($_GET['ajax']) && $_GET['ajax'] == "1") {
    $q = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : "";

    if($q != ""){
        $sql = "SELECT * FROM menu WHERE nome LIKE '%$q%' OR tipo LIKE '%$q%' ORDER BY id DESC";
    } else {
        $sql = "SELECT * FROM menu ORDER BY id DESC";
    }

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <div class="menu-item">
                <div class="menu-info">
                    <img src="<?php echo $row['foto']; ?>" alt="<?php echo $row['nome']; ?>">
                    <div>
                        <strong><?php echo ucfirst($row['nome']); ?></strong>
                        <span>Categoria: <?php echo ucfirst($row['tipo']); ?></span>
                        <span>Prezzo: € <?php echo number_format($row['prezzo'], 2, ',', '.'); ?></span>
                    </div>
                </div>
                <div class="menu-actions">
                    <a href="menu_modifica.php?id=<?php echo $row['id']; ?>" class="btn-edit">Modifica</a>
                    <a href="menu_elimina.php?id=<?php echo $row['id']; ?>" 
                       onclick="return confirm('Sei sicuro di voler eliminare questa voce?')"
                       class="btn-delete">Elimina</a>
                </div>
            </div>
        <?php }
    } else {
        echo "<p>Nessuna voce trovata.</p>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="../img/logo-1.png" type="image/x-icon">
    <title>Gestione Menu</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/reset.css">
    <style>
        .search-box {
            width: 60%;
            margin: 20px auto;
            text-align: center;
        }
        .search-box input {
            width: 60%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .menu-container {
            width: 70%;
            margin-left:25%;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            flex-wrap: wrap;
        }

        .menu-info {
            display: flex;
            gap: 15px;
            flex: 1 1 60%;
            align-items: center;
        }

        .menu-info img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .menu-info div {
            display: flex;
            flex-direction: column;
        }

        .menu-actions {
            display: flex;
            gap: 10px;
            flex: 1 1 30%;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            color: #fff;
        }

        .btn-edit { background: #007bff; }
        .btn-edit:hover { background: #0056b3; }
        .btn-delete { background: #dc3545; }
        .btn-delete:hover { background: #b02a37; }

        
        @media (max-width: 768px) {
            .search-box input { width: 90%; font-size: 14px; }
            .menu-item {
                flex-direction: column;
                align-items: flex-start;
            }
            .menu-info {
                flex: 1 1 100%;
            }
            .menu-actions {
                flex: 1 1 100%;
                justify-content: flex-start;
                margin-top: 10px;
            }
            .menu-info img { width: 50px; height: 50px; }
        }
    </style>
</head>
<body>
    <?php require_once "../include/menu_config.php" ?>

    <div>
         <h2 style="text-align:center;">Lista Voci di Menu</h2>
    </div>

   
    <div class="search-box">
        <input type="text" id="search" placeholder="Cerca per nome o categoria...">
    </div>

    
    <div class="menu-container" id="menu-container">
        Caricamento...
    </div>

    <script>
        
        function loadResults(query = "") {
            fetch("menu_lista.php?ajax=1&q=" + encodeURIComponent(query))
                .then(response => response.text())
                .then(data => {
                    document.getElementById("menu-container").innerHTML = data;
                });
        }
o
        document.addEventListener("DOMContentLoaded", function() {
            loadResults();

            document.getElementById("search").addEventListener("input", function() {
                loadResults(this.value);
            });
        });
    </script>  
</body>
</html>
