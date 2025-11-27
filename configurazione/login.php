<?php
session_start();
require_once "config.php";

// Connessione DB
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$errore = "";

// Se il form è inviato
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM utenti WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verifica password hashata
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["nome"] = $row["nome"];
            $_SESSION["cognome"] = $row["cognome"];
            header("Location: menu_lista.php");
            exit;
        } else {
            $errore = "❌ Password errata!";
        }
    } else {
        $errore = "❌ Utente non trovato!";
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            margin:0;
            padding:0;
            box-sizing:border-box;
            display:flex;
            align-items:center;
            justify-content:center;
            min-height:100vh;
            background-color:#ededed;
            font-family:Arial, sans-serif;
        }
        .login-box{
            width: 400px;
            background:#fff;
            display:flex;
            flex-direction:column;
            padding:20px;
            gap:15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius:8px;
        }
        .login-box h2{
            text-align:center;
            color:#e8a445;
            margin-bottom:10px;
        }
        .login-box input{
            width: 90%;
            padding:12px;
            font-size:14px;
            border:1px solid #ccc;
            border-radius:6px;
            transition:all .3s ease;
            margin:5px;
        }
        .login-box input:focus{
            border-color:#e8a445;
            outline:none;
            box-shadow:0 0 4px rgba(232,164,69,0.6);
        }
        .login-box button{
            padding:12px;
            background:#570707;
            border:none;
            font-size:16px;
            font-weight:bold;
            color:#fff;
            border-radius:6px;
            cursor:pointer;
            transition:.3s;
        }
        .login-box button:hover{
            background:#e8a445;
            color:#000;
        }
        .errore{
            color:red;
            text-align:center;
            font-size:14px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        <?php if(!empty($errore)): ?>
            <p class="errore"><?php echo $errore; ?></p>
        <?php endif; ?>

        <form method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Entra</button>
        </form>
    </div>
</body>
</html>
