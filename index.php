<?php

    session_start();
    $database = @new mysqli('localhost', 'root', '', 'minecraftsystems');

    if($database->connect_errno!=0){
        echo "Nastąpił problem z połączeniem! <br/> Error: ".$database->connect_errno;
        exit();
    } else {
        $database->query("set names utf8");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MinecraftSystem | Strona główna</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    
</head>
<body>
    <nav>
        <div id="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="logo">
                MinecraftSystem
            </a>
        </div>
        <div class="button">
            <img src="img/menu.png" alt="menu">
        </div>
        <ul class="links">
            <li><a href="zakup.php">Zakup</a></li>
            <li><a href="magazyn.php">Magazyn</a></li>
            <li><a href="sprzedaz.php">Sprzedaz</a></li>
        </ul>
    </nav>
    <main>
        <div>
            <table>
                <tr>
                    <th colspan="2">Podsumowanie</th>
                </tr>
                <tr>
                    <td>Wydatki</td>
                    <td>0zł</td>
                </tr>
                <tr>
                    <td>Przychody</td>
                    <td>0zł</td>
                </tr>
                <tr>
                    <td>Zysk</td>
                    <td>0zł</td>
                </tr>
                <tr>
                    <td>Ilość artykułów w magazynie</td>
                    <td>0szt.</td>
                </tr>
            </table>
        </div>
    </main>
</body>
<script src='main.js'></script>
</html>