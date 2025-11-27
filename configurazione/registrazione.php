<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
 require_once "config.php";
 $conn=new mysqli($host,$user,$password,$dbname);


  if($_SERVER["REQUEST_METHOD"] =="POST"){
    
        $nome=$_POST["nome"];
        $cognome=$_POST["cognome"];
        $email=$_POST["email"];
        $password=password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql="insert into utenti (nome,cognome,email,password) values(?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ssss",$nome,$cognome,$email,$password);

     if($stmt->execute()){
        echo "registrazione fatta vai <a href='menu_lista.php'>Login</a>";
    
     } else {
        echo" registrazione non e stata fatta ";
     }


  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/reset.css">
    <title>Document</title>

</head>
<body>
    <?php require_once "../include/menu_config.php";?>
    <div>
        <h2>Nuovo utente</h2>
    </div>
   
    <div class="nuova_voce">

        
        <form action="" method="POST">
            <div class="form-row">
                <label for="">Nome</label>
                <input type="text" name="nome" id="" required placeholder=" il tuo nome">
             </div>
            <div class="form-row">
                 <label for="">Cognome</label>
                 <input type="text" name="cognome" id="" required placeholder=" Il tuo cognome">
           
            </div>
             <div class="form-row">
                 <label for="">Email</label>
                   <input type="email" name="email" id="" required placeholder="scrivi la tua emil">
                  
            </div>
             <div class="form-row">
                 <label for="">Password</label>
                 <input type="password" name="password" id="" required placeholder="la tua passwrod">
                  
            </div>
            <button type="submit">Registar</button>
        </form>
    </div>
</body>
</html>