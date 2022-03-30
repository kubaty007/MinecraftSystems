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
            <legend>Stan magazynowy</legend>
            <table>
                <tr>
                    <th colspan="3">Materiały</th>
                    
                </tr>
                <tr>
                    <td>Nazwa</td>
                    <td>Stan magazynowy</td>
                    <td>Łączna wartość</td>
                    
                </tr>

                <?php

                    $result_stan_materialy=$database->query("SELECT materialy.nazwa, materialy.stan_magazynowy, materialy.cena FROM materialy");
                    
                    while($row_stan_materialy = $result_stan_materialy->fetch_assoc()){

                        $wartosc_materialy = $row_stan_materialy['stan_magazynowy'] * $row_stan_materialy['cena'];
                        
                        echo "<tr> <td>".$row_stan_materialy['nazwa']."</td> <td>".$row_stan_materialy['stan_magazynowy']."</td> <td>$wartosc_materialy zł</td></tr>";
                    }
                    ?>

            </table>
            <br/>
            <table>
                <tr>
                    <th colspan="3">Produkty</th>
                </tr>
                <tr>
                    <td>Nazwa</td>
                    <td>Stan magazynowy</td>
                    <td>Łączna wartość</td>
                </tr>

                <?php

                    $result_stan_produkty=$database->query("SELECT produkty.nazwa, produkty.stan_magazynowy, produkty.cena FROM produkty");

                    while($row_stan_produkty = $result_stan_produkty->fetch_assoc()){

                        $wartosc_produkty = $row_stan_produkty['stan_magazynowy'] * $row_stan_produkty['cena'];

                        echo "<tr> <td>".$row_stan_produkty['nazwa']."</td> <td>".$row_stan_produkty['stan_magazynowy']."</td><td>$wartosc_produkty zł</td></tr>";
                    }

                ?>

            </table>
        </fieldset>
        <fieldset>
            <legend>Przetwarzanie materiałów na produkty</legend>

            <?php

                if(!isset($_POST['choice']) || empty($_POST['choice'])){
                    echo "<form method='post' action='magazyn.php'><select name='choice'>";
                    $result_przetwarzanie1 = $database->query("SELECT produkty.id, produkty.nazwa FROM produkty;");
                    while($row_przetwarzanie1 = $result_przetwarzanie1->fetch_assoc()){
                        echo "<option value='".$row_przetwarzanie1['nazwa']."'>".$row_przetwarzanie1['nazwa']."</option>";
                    }
                    echo "<select/><input id='wybor_tworzenie' type='submit' value='Wybierz'></form>";
                    if(isset($_SESSION['error'])){
                        echo "<br/><span style='color: red'>".$_SESSION['error']."</span>";
                        unset($_SESSION['error']);
                    }
                }
                else{
                    $_SESSION['nazwa_produktu'] = $_POST['choice'];

                    //poczatek tabeli
                    $result_przetwarzanie1 = $database->query("SELECT produkty.id, produkty.nazwa FROM produkty WHERE produkty.nazwa =  '".$_SESSION['nazwa_produktu']."';");
                    $row_przetwarzanie1 = $result_przetwarzanie1->fetch_assoc();


                    //rowspan
                    $result_rowspan = $database->query("SELECT COUNT(produkty.id) AS 'liczba_rekordow' FROM produkty
                        INNER JOIN receptury
                        ON produkty.id = receptury.id_produkty
                        INNER JOIN receptura_materialy
                        ON receptury.id = receptura_materialy.id_receptury
                        INNER JOIN materialy
                        ON materialy.id = receptura_materialy.id_materialy
                        WHERE produkty.nazwa = '".$_SESSION['nazwa_produktu']."';");
                    $row_rowspan = $result_rowspan->fetch_assoc();

                    //szczegóły tabeli
                    $result_przetwarzanie2 = $database->query("SELECT materialy.nazwa, receptura_materialy.wymagana_ilosc, materialy.stan_magazynowy from produkty
                        INNER JOIN receptury
                        ON produkty.id = receptury.id_produkty
                        INNER JOIN receptura_materialy
                        ON receptury.id = receptura_materialy.id_receptury
                        INNER JOIN materialy
                        ON materialy.id = receptura_materialy.id_materialy
                        WHERE produkty.nazwa =  '".$_SESSION['nazwa_produktu']."'
                        ORDER BY materialy.cena;");
                    

                    
                    
                    echo"<form method='post' action='przetwarzanieSkrypt.php'>
                    <table>
                        <tr>
                            <td>Produkt</td>
                            <td>Wymag. materiały</td>
                            <td>Wymag. ilość</td>
                            <td>Stan magazynowy</td>
                            <td>Ilość do wytworzenia</td>
                        </tr>
                        <tr>
                            <td rowspan='".$row_rowspan['liczba_rekordow']."'>".$row_przetwarzanie1['nazwa']."</td>";

                    $var1_taken = false;

                    $shown_input = false;

                    while($row_przetwarzanie2 = $result_przetwarzanie2->fetch_assoc()){
                        
                        if(!$var1_taken){
                            $var1_stan_magazynowy = $row_przetwarzanie2['stan_magazynowy'];
                            $var1_wymagana_ilosc = $row_przetwarzanie2['wymagana_ilosc'];
                            $var1_taken = true;
                        }

                        if($var1_taken){
                            $var2_stan_magazynowy = $row_przetwarzanie2['stan_magazynowy'];
                            $var2_wymagana_ilosc = $row_przetwarzanie2['wymagana_ilosc'];
                            
                        }

                        $max1 = floor($var1_stan_magazynowy / $var1_wymagana_ilosc);
                        $max2 = floor($var2_stan_magazynowy / $var2_wymagana_ilosc);

                        if($max1 < $max2){
                            $max = $max1;
                        } else {
                            $max = $max2;
                        }

                        echo "<td>".$row_przetwarzanie2['nazwa']."</td><td>".$row_przetwarzanie2['wymagana_ilosc']."</td><td>".$row_przetwarzanie2['stan_magazynowy']."</td>";

                        if(!$shown_input){
                            echo "<td rowspan='".$row_rowspan['liczba_rekordow']."'><input id='ilosc_tworzenie' type='number' placeholder='max' min='0' max='max' name='ilosc_produktu' required></td>";
                            $shown_input = true;
                        }


                        echo "</tr>";

                        }
                        echo "</table><input type='submit' value='Wytwórz'></form>";

                        echo "<input id='max' type='hidden' value='".$max."'>";
                }

            ?>


            

        </fieldset>
    </main>
</body>
<script src='main.js'></script>
<script src='max.js'></script>
</html>