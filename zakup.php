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
            <li><a href="sprzedaz.php">Sprzedaż</a></li>
        </ul>
    </nav>
    <main>
        <fieldset>
            <legend>Zakup materiałów:</legend>
            <form method="POST" action="kupowanieSkrypt.php">
                <table>
                    <tr>
                        <td>Nazwa</td>
                        <td>Aktualna ilość w magazynie</td>
                        <td>Cena (PLN)</td>
                        <td>Ile chcesz kupić</td>
                    </tr>
                    <?php
                        $result_zakup=$database->query("SELECT materialy.nazwa, materialy.cena, materialy.stan_magazynowy FROM materialy ORDER BY materialy.cena;");
                        while($row_zakup = $result_zakup->fetch_assoc()){
                            echo '<tr><td>'.$row_zakup['nazwa'].'</td><td>'.$row_zakup['stan_magazynowy'].'</td><td>'.$row_zakup['cena'].'</td><td><input type="number" min="0" max="64" placeholder="0" name="'.$row_zakup['nazwa'].'"></td><tr/>';
                        }
                    ?>
                </table>
                <input type="submit" value="Zamów">
                <input type="reset" value="Reset formularza">
            </form>
        </fieldset>
        <fieldset>
            <legend>Historia transakcji</legend>
            <table>
            <tr><td> ID </td><td> Data i godzina </td><td> Materiał </td><td> Ilość </td><td> Cena za szt. </td><td> Łączna wartość </td></tr>
            <?php
                $result_historia=$database->query("SELECT * FROM transakcje_kupno ORDER BY transakcje_kupno.data DESC;");
                while($row_historia = $result_historia->fetch_assoc()){

                    //colspan
                    $result_colspan=$database->query(
                        "SELECT transakcje_kupno.id, COUNT(transakcje_kupno.id) as liczba_rekordow FROM transakcje_kupno
                        INNER JOIN transakcja_kupno_materialy
                        ON transakcje_kupno.id = transakcja_kupno_materialy.id_transakcje_kupno
                        INNER JOIN materialy
                        ON materialy.id = transakcja_kupno_materialy.id_materialy
                        WHERE transakcje_kupno.id = '".$row_historia['id']."'
                        GROUP BY transakcje_kupno.id;");
                    $row_colspan = $result_colspan->fetch_assoc();

                    //szczegoly tabeli

                    $result_historia2=$database->query(
                        "SELECT materialy.nazwa, transakcja_kupno_materialy.ilosc, materialy.cena FROM transakcje_kupno
                        INNER JOIN transakcja_kupno_materialy
                        ON transakcje_kupno.id = transakcja_kupno_materialy.id_transakcje_kupno
                        INNER JOIN materialy
                        ON materialy.id = transakcja_kupno_materialy.id_materialy
                        WHERE transakcje_kupno.id = ".$row_historia['id'].";");
                    

                    //tabela
                    echo " 
                    <tr><td rowspan='".$row_colspan['liczba_rekordow']."'> ".$row_historia['id']." </td><td rowspan='".$row_colspan['liczba_rekordow']."'> ".$row_historia['data']." </td>";
                    while($row_historia2 = $result_historia2->fetch_assoc()){

                        $wartosc = $row_historia2['ilosc'] * $row_historia2['cena'];

                        echo "<td>".$row_historia2['nazwa']."</td><td>".$row_historia2['ilosc']."</td><td>".$row_historia2['cena']." zł</td><td>".$wartosc." zł</td></tr>";
                    }
                    
                }
            ?>
            </table>
        </fieldset>
    </main>
</body>
<script src='main.js'></script>
</html>