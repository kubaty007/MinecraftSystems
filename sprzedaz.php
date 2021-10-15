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
    <title>MinecraftSystem | Zakup</title>
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
        <fieldset>
            <legend>Sprzedaważ produktów:</legend>
            <form method="POST" action="sprzedawanieSkrypt.php">
                <table>
                    <tr>
                        <td>Nazwa</td>
                        <td>Aktualna ilość w magazynie</td>
                        <td>Cena (PLN)</td>
                        <td>Ile chcesz sprzedać</td>
                    </tr>
                    <?php
                        $result_sprzedaz=$database->query("SELECT produkty.nazwa, produkty.stan_magazynowy, produkty.cena FROM produkty");

                    
                        while($row_sprzedaz = $result_sprzedaz->fetch_assoc()){

                            echo "<tr> <td>".$row_sprzedaz['nazwa']."</td> <td>".$row_sprzedaz['stan_magazynowy']."</td> <td>".$row_sprzedaz['cena']." zł</td><td><input type='number' min='0' max='".$row_sprzedaz['stan_magazynowy']."' placeholder='max. ".$row_sprzedaz['stan_magazynowy']."' name='".$row_sprzedaz['nazwa']."'></td></tr>";
                        }
                    ?>
                    
                </table>
                <input type="submit" value="Sprzedaj">
                <input type="reset" value="Reset formularza">
            </form>
        </fieldset>
        <fieldset>
            <legend>Historia transakcji</legend>
            <table>
            <tr><td> ID </td><td> Data i godzina </td><td> Materiał </td><td> Ilość </td><td> Cena za szt. </td><td> Łączna wartość </td></tr>
            <?php
               
            ?>
            </table>
        </fieldset>
    </main>
</body>
<script src='main.js'></script>
</html>