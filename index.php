<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ristorante 1000miglia a Ferrara: pizze artigianali, hamburger gourmet, dolci fatti in casa e aperitivi. Ordina con Glovo, JustEat e Deliveroo.">
    <link rel="shortcut icon" href="img/logo-1.png" type="image/x-icon">
    <!--CSS-->
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/style.css">
      <!--Font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Epunda+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
            
    <title>PIZZERIA | 1000MIGLIA </title>
</head>
<body>

   <?php  require_once 'include/header.php'?>


   <section class="specialita-gallery">
     <div class="specialita" id="specialita">
        <h2>Le nostre specialità</h2>
     </div>
     <div class="gallery">
        <div class="gallery-content ">
            <img src="img/foto1.jpg" alt="">
            <div>
                <h2>PIZZA</h2>
                <p>Gusta le nostre pizze artigianali, preparate con ingredienti freschi e un impasto lievitato naturalmente. Perfette per ogni occasione, dalla cena in famiglia all’aperitivo con amici.</p>
                  <a href="menu.php">Scopri </a>
            </div>
        </div>
        
        <div class="gallery-content ">
            <img src="img/gal7.jpg" alt="">
            <div>
                <h2>hamburger</h2>
                <p>I nostri hamburger gourmet sono preparati con carne selezionata, pane fresco e condimenti </P>
                  <a href="menu.php">Scopri </a>           
              </div>
        </div>
        
        <div class="gallery-content ">
            <img src="img/gal8.jpg" alt="">
            <div>
                <h2>dolce & bevandi</h2>
                <p>Dai dolci fatti in casa ai cocktail più creativi, ogni momento da noi si trasforma in un’esperienza golosa e piacevole.</p>
                 <a href="menu.php">Scopri </a>
              </div>
        </div>
        
        <div class="gallery-content ">
            <img src="img/gal9.jpg" alt="">
            <div>
                <h2>Aperitivi</h2>
                    <p>Un’ampia scelta di aperitivi e stuzzichini per iniziare la serata nel modo giusto, in un locale accogliente e conviviale.</p>
              <a href="menu.php">Scopri </a>
            </div>
        </div>
     </div>
   </section>
     <section>
    <div class="foto" id="foto">
      <div class="foto-testo">
        <h2>Galleria 1000 Miglia</h2>
        <p>
          Stai cercando foto dei piatti e dell'atmosfera di 1000 Miglia? Dai un'occhiata a queste foto e immagini
          dell'atmosfera e dei piatti di 1000 Miglia, così saprai cosa aspettarti per la tua futura prenotazione.
          Mangia con gli occhi e risveglia il buongustaio che c'è in te con queste foto del team di 1000 Miglia.
        </p>
      </div>

      <div class="foto-gallery">
        <img src="img/img-g1.jpg" alt="Piatto tipico 1">
        <img src="img/img-g2.jpg" alt="Piatto tipico 2">
        <img src="img/img-g3.jpg" alt="Interno del ristorante">
        <img src="img/gal3.jpg" alt="Piatto tipico 3">
        <img src="img/img-g4.jpg" alt="Tagliere di salumi">
        <img src="img/img-g5.jpg" alt="Piatto tipico 1">
        <img src="img/gal2.jpg" alt="Piatto tipico 2">
        <img src="img/img-g8.jpg" alt="Interno del ristorante">
        <img src="img/img-g7.jpg" alt="Piatto tipico 3">
        <img src="img/img-g6.jpg" alt="Tagliere di salumi">
      </div>
    </div>
  </section>
   <section id="social">
    <div class="raggiungere">
            <div class="section">
            <h3>Seguici</h3>
                    <a href="https://facebook.com" target="_blank">Facebook</a>
                    <a href="https://instagram.com" target="_blank">Instagram</a>
                    <a href="https://tiktok.com" target="_blank">TikTok</a>
            </div>
            <div class="section">
            <h3>Ordina online</h3>
                <a href="https://glovoapp.com" target="_blank">Glovo</a>
                <a href="https://justeat.it" target="_blank">JustEat</a>
                <a href="https://deliveroo.it" target="_blank">Deliveroo</a>
            </div>

            <div class="section ">
            <h3>Contatti</h3>
                    <p>Email: <a href="mailto:info@tuoristorante.it">1000miglia73@gmail.com</a></p>
                    <p>Telefono: <a href="tel:+390000000000">+39 0532 900787</a></p>
                    <p>Indirizzo: Via Bologna 513, 44121 Ferrara</p>
                    <p><a href="https://wa.me/00393474764207" target="_blank">WhatsAPP</a></p>
                  </div>
    </div>
   </section>
<section class="mappa">
  <div class="position-contact">
    <div class="position-center map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5661.132524454998!2d11.590092737838072!3d44.81002737685015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477e4e9d0808d433%3A0xc9b3952ec94d3f87!2sVia%20Bologna%2C%20513%2C%2044124%20Ferrara%20FE!5e0!3m2!1sfr!2sit!4v1757870133494!5m2!1sfr!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="position-center form-container">
      <form action="configurazione/salva_form.php" method="POST">
        <div>
          <label for="">Nome</label>
          <input type="text" required placeholder="Inserisci il tuo nome" name="nome">
        </div>
        <div>
          <label for="">Cognome</label>
          <input type="text" required placeholder="Inserisci il tuo cognome" name="cognome">
        </div>
        <div>
          <label for="">Telefono</label>
          <input type="text" required placeholder="Inserisci il tuo numero di telefono" name="telefono">
        </div>
        <div>
          <label for="">Email</label>
          <input type="text" required placeholder="Inserisci il tuo email" name="email">
        </div>
        <div>
          <label for="">Messaggio</label>
          <textarea name="messaggio" required placeholder="Scrivi il tuo messaggio"></textarea>
        </div>
        <div class="checkbox-container">
            <input type="checkbox" id="privacy" name="privacy" required>
            <label for="privacy">Accetto la <a href="#">Privacy Policy</a></label>
            </div>
        <button type="submit">Invia</button>
      </form>
    </div>
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