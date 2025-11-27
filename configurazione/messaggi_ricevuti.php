<?php 
require_once "config.php";
$conn = new mysqli($host, $user, $password, $dbname);
if($conn->connect_error){
    die("Connessione fallita: ".$conn->connect_error);
}


$sql = "SELECT * FROM contatti ORDER BY data_invio DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="../img/logo-1.png" type="image/x-icon">
    <title> Contatti Ricevuti</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/reset.css">

    <style>
        .contacts-container {
            width: 100%;
            margin-left: 15%;
            margin-top:20px;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
        }
        .contacts-table {
            width: 80%;
            border-collapse: collapse;
        }
        .contacts-table th, .contacts-table td {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }
        .contacts-table th {
            background: #f4f4f4;
            text-align: left;
        }
        .contacts-table tr:nth-child(even) {
            background: #fafafa;
        }
        .search-box {
            width: 80%;
            margin-left: 20%;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .search-box input {
            width: 50%;
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        .toggle-btn {
            cursor: pointer;
            background: #007bff;
            color: white;
            border: none;
            padding: 3px 7px;
            border-radius: 5px;
            font-size: 12px;
            margin-left: 5px;
        }
        .toggle-btn:hover {
            background: #0056b3;
        }
        /* Mobile responsive */
@media (max-width: 768px) {
    .contacts-container {
        width: auto;
        margin-left: 20%;
        margin-right: auto;
        padding: 3px;
    }

    .contacts-table {
        width: 100%;
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    .contacts-table th, .contacts-table td {
        font-size: 12px;
        padding: 6px;
    }

    .search-box input {
        width: 50%;
        font-size: 14px;
    }

    .toggle-btn, .contacts-table a {
        font-size: 11px;
        padding: 3px 5px;
    }

    .contacts-table th:nth-child(1),
    .contacts-table td:nth-child(1) {
        min-width: 70px; 
    }
}

    </style>
</head>
<body>
    <?php require_once "../include/menu_config.php" ?>

    <div>
        <h2> Contatti Ricevuti</h2>
    </div>

    <!-- Barra ricerca -->
    <div class="search-box">
        <input type="text" id="search" placeholder="Cerca per nome, cognome, email o telefono...">
    </div>

    <!-- Contenitore tabella contatti -->
    <div class="contacts-container" id="contacts-container">
        <table class="contacts-table" id="contacts-table">
            <thead>
                <tr>
                   
                    <th>Data Invio</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Messaggio</th>
                    <th>Privacy</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date("d/m/Y H:i", strtotime($row['data_invio'])); ?></td>
                            <td><?php echo htmlspecialchars($row['nome']); ?></td>
                            <td><?php echo htmlspecialchars($row['cognome']); ?></td>
                            <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td>
                                <?php 
                                $messaggio = htmlspecialchars($row['messaggio']);
                                if(strlen($messaggio) > 1){
                                   
                                    echo '<button class="toggle-btn" onclick="toggleMessage(this)">Mostra</button>';
                                    echo '<span class="full-message" style="display:none;">'.nl2br($messaggio).'</span>';
                                } else {
                                    echo nl2br($messaggio);
                                }
                                ?>
                            </td>
                            <td><?php echo $row['privacy'] ? " Accettata" : " Non accettata"; ?></td>
                            
                            <td>
                                                            <a href="contatti_elimina.php?id=<?php echo $row['id']; ?>" 
                                onclick="return confirm('Sei sicuro di voler eliminare questo contatto?')"
                                style="background:#dc3545; color:white; padding:3px 6px; border-radius:5px; text-decoration:none; font-size:12px; margin-top:3px; display:inline-block;">
                                 Elimina
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8">Nessun contatto ricevuto.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        
        function toggleMessage(btn){
            let shortText = btn.previousSibling.textContent;
            let fullMsg = btn.nextElementSibling;
            if(fullMsg.style.display === "none"){
                fullMsg.style.display = "inline";
                btn.previousSibling.textContent = "";
                btn.textContent = "Nascondi";
            } else {
                fullMsg.style.display = "none";
                btn.previousSibling.textContent = shortText;
                btn.textContent = "Mostra";
            }
        }

       
        const searchInput = document.getElementById("search");
        searchInput.addEventListener("input", function(){
            let filter = this.value.toLowerCase();
            const rows = document.querySelectorAll("#contacts-table tbody tr");
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    </script>
</body>
</html>
