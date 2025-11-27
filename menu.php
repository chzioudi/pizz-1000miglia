<?php
require_once "configurazione/config.php";
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) die("Connessione fallita: " . $conn->connect_error);

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);
$piatti = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $piatti[$row["tipo"]][] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="img/logo-1.png" type="image/x-icon">
    <!--CSS-->
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/style.css">
      <!--Font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Epunda+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
            
  <title>Menu Ristorante</title>
 
</head>
<body>
    <?php require_once "include/header.php"?>
<div class="menu-ordine">

  <h5>Il nostro Menu</h5>
</diu>

  <!-- Bottoni categorie -->
  <div class="menu-tabs">
    <button onclick="showCategory('pizza')">Pizza</button>
    <button onclick="showCategory('hamburger')">Hamburger</button>
    <button onclick="showCategory('dolce')">Dolci</button>
    <button onclick="showCategory('bevanda')">Bevande</button>
  </div>

  <!-- Ricerca -->
  <input type="text" id="search" placeholder="Cerca nel menu..." onkeyup="filterMenu()">

  <!-- Container menu -->
  <?php foreach ($piatti as $categoria => $lista): ?>
    <div id="menu-<?= $categoria ?>" class="menu-grid">
      <?php foreach ($lista as $p): ?>
        <div class="card">
          <img src="configurazione/<?= htmlspecialchars($p['foto']) ?>" alt="<?= htmlspecialchars($p['nome']) ?>">
          <h3><?= htmlspecialchars($p['nome']) ?></h3>
          <p><?= number_format($p['prezzo'], 2) ?> €</p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
  <div class="whatsapp">
    <a href="https://wa.me/00393474764207" target="_blank">
      WhatsApp
     </a>
</div>

    <?php require_once"include/footer.php"?>
  <script >
     let hamburger=document.getElementById("hamburger");
     let navlink=document.getElementById("nav-link");
     hamburger.addEventListener("click",() => {
        navlink.classList.toggle("active");
        hamburger.classList.toggle("open")
     });


  </script>
  <script>
   
 function showCategory(cat) {
  document.querySelectorAll('.menu-grid').forEach(c => c.classList.remove('active'));
  document.getElementById('menu-'+cat).classList.add('active');
}

// Mostra Pizza di default
showCategory('pizza');

function filterMenu() {
  let input = document.getElementById("search").value.toLowerCase();
  document.querySelectorAll(".menu-grid.active .card").forEach(item => {
    let text = item.innerText.toLowerCase();
    item.style.display = text.includes(input) ? "block" : "none";
  });
}
  </script>
</body>
</html>
