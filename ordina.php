<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ordina Ora - Ristorante 1000miglia</title>

<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Epunda+Sans:wght@400;700&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-1.png" type="image/x-icon">
    
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-yx1C6p+l5T+..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- CSS principale -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/reset.css">

</head>
<body>
  
<?php  require_once 'include/header.php'?>
<section class="opzioni">
    <!-- Ordina al telefono -->
    <div class="opzione-telefono">
      <h2> Ordina al telefono</h2>
      <p>Chiama direttamente il nostro ristorante e prenota il tuo ordine per asporto o consegna a domicilio.</p>
      <a href="tel:+390532900787">+39 0532 900787 </a>
    
    </div>
</section>
<section class="opzioni">
  <div class="opzioni-container">
    <!-- Glovo -->
    <div class="opzione-box">
      <h2> Glovo</h2>
      <p>Il nostro menù completo su Glovo e ricevi comodamente a casa tua.</p>
      <a href="https://glovoapp.com" target="_blank" > Ordina con Glovo
      </a>
    </div>

    <!-- JustEat -->
    <div class="opzione-box">
      <h2> JustEat</h2>
      <p>Ordina tramite JustEat per ricevere a domicilio o ritirare al locale.</p>
      <a href="https://www.justeat.it/restaurants-pizzeria-hamburgeria-1000-miglia-ferrara-/menu#pre-order" target="_blank" class="btn justeat">Ordina con JustEat
      </a>
    </div>

    <!-- Deliveroo -->
    <div class="opzione-box">
      <h2> Deliveroo</h2>
      <p>Il nostro menù è disponibile anche su Deliveroo, ordina in pochi clic!</p>
      <a href="https://deliveroo.it" target="_blank" > Ordina con Deliveroo
      </a>
    </div>
  </div>  
</section>
<section class="opzioni">
  <!-- Vieni al ristorante -->
    <div class="opzione-posizione">
      <h2> Vieni a trovarci</h2>
      <p>Il nostro ristorante ti accoglie tutti i giorni dalle 12:00 alle 14:30 e dalle 18:30 alle 23:00. Gustati pizze, hamburger, dolci e aperitivi sul posto.</p>
      <p>Indirizzo: Via Bologna 513, 44121 Ferrara</p>
   </div>  
   <div class="iframe">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5661.132524454998!2d11.590092737838072!3d44.81002737685015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477e4e9d0808d433%3A0xc9b3952ec94d3f87!2sVia%20Bologna%2C%20513%2C%2044124%20Ferrara%20FE!5e0!3m2!1sfr!2sit!4v1757870133494!5m2!1sfr!2sit" width="100%" height="400" margin=auto style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
</section>
<div class="whatsapp">
    <a href="https://wa.me/00393474764207" target="_blank">
      WhatsApp
     </a>
</div>

<?php require_once "include/footer.php"?>
<script src="js/js.js"></script>
</body>
</html>
