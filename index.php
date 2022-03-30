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
    

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      
      google.charts.setOnLoadCallback(drawMaterialyStanChart);

      
      google.charts.setOnLoadCallback(drawProduktyStanChart);

      google.charts.setOnLoadCallback(drawMaterialyWartoscChart);

      google.charts.setOnLoadCallback(drawProduktyWartoscChart);

      
      function drawMaterialyStanChart() {

        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Materiał');
        data.addColumn('number', 'StanMagazynowy');
        data.addRows([
          <?php
                $result_material_stan = $database->query("SELECT materialy.nazwa, materialy.stan_magazynowy from materialy;");
                while($row_material_stan = $result_material_stan->fetch_assoc()){
                    echo "['".$row_material_stan['nazwa']."', ".$row_material_stan['stan_magazynowy']."],";
                }
          ?>
        ]);

        
        var options = {title:'Aktualny stan magazynowy materiałów',
                       width:450,
                       height:450,
                       backgroundColor:'transparent',
                       is3D:true,
                       titleTextStyle:{
                            color: 'white',
                            fontSize: 20,
                            bold: false,
                            italic: false},
                        legend:{
                            position: 'none',
                            textStyle:{
                            color: 'white',
                            fontSize: 15
                            }  
                        }};

        
        var chart = new google.visualization.PieChart(document.getElementById('materialy_stan'));
        chart.draw(data, options);
      }






     
      function drawProduktyStanChart() {

        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Produkt');
        data.addColumn('number', 'StanMagazynowy');
        data.addRows([
            <?php
                $result_produkt_stan = $database->query("SELECT produkty.nazwa, produkty.stan_magazynowy FROM produkty;");
                while($row_produkt_stan = $result_produkt_stan->fetch_assoc()){
                    echo "['".$row_produkt_stan['nazwa']."', ".$row_produkt_stan['stan_magazynowy']."],";
                }
                ?>
        ]);

        
        var options = {title:'Aktualny stan magazynowy produktów',
                       width:450,
                       height:450,
                       backgroundColor:'transparent',
                       is3D:true,
                       titleTextStyle:{
                            color: 'white',
                            fontSize: 20,
                            bold: false,
                            italic: false},
                       legend:{
                           position: 'none',
                           textStyle:{
                               color: 'white',
                               fontSize: 15
                           }
                       }};

        
        var chart = new google.visualization.PieChart(document.getElementById('produkty_stan'));
        chart.draw(data, options);
      }








      function drawMaterialyWartoscChart() {

        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Material');
        data.addColumn('number', 'Wartosc');
        data.addRows([
            <?php
                $result_material_wartosc = $database->query("SELECT materialy.nazwa, materialy.cena, materialy.stan_magazynowy from materialy");
                while($row_material_wartosc = $result_material_wartosc->fetch_assoc()){
                    $wartosc = $row_material_wartosc['cena'] * $row_material_wartosc['stan_magazynowy'];
                    echo "['".$row_material_wartosc['nazwa']."', ".$wartosc."],";
                }
                ?>
        ]);

        
        var options = {title:'Aktualna wartość materiałów w magazynie',
                       width:450,
                       height:450,
                       backgroundColor:'transparent',
                       is3D:true,
                       titleTextStyle:{
                            color: 'white',
                            fontSize: 20,
                            bold: false,
                            italic: false},
                       legend:{
                           position: 'none',
                           textStyle:{
                               color: 'white',
                               fontSize: 15
                           }
                       }};

        
        var chart = new google.visualization.PieChart(document.getElementById('materialy_wartosc'));
        chart.draw(data, options);
      }








        function drawProduktyWartoscChart() {

        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Produkt');
        data.addColumn('number', 'Wartosc');
        data.addRows([
            <?php
                $result_produkt_wartosc = $database->query("SELECT produkty.nazwa, produkty.cena, produkty.stan_magazynowy from produkty");
                while($row_produkt_wartosc = $result_produkt_wartosc->fetch_assoc()){
                    $wartosc = $row_produkt_wartosc['cena'] * $row_produkt_wartosc['stan_magazynowy'];
                    echo "['".$row_produkt_wartosc['nazwa']."', ".$wartosc."],";
                }
                ?>
        ]);


        var options = {title:'Aktualna wartość produktów w magazynie',
                    width:450,
                    height:450,
                    backgroundColor:'transparent',
                    is3D:true,
                    titleTextStyle:{
                            color: 'white',
                            fontSize: 20,
                            bold: false,
                            italic: false},
                    legend:{
                        position: 'none',
                        textStyle:{
                            color: 'white',
                            fontSize: 15
                        }
                    }};


        var chart = new google.visualization.PieChart(document.getElementById('produkty_wartosc'));
        chart.draw(data, options);
        }







        
    </script>



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
                    <td>
                        <?php
                            $result_wydatki = $database->query("
                                SELECT transakcja_kupno_materialy.ilosc, materialy.cena FROM transakcje_kupno
                                INNER JOIN transakcja_kupno_materialy
                                ON transakcje_kupno.id = transakcja_kupno_materialy.id_transakcje_kupno
                                INNER JOIN materialy
                                ON materialy.id = transakcja_kupno_materialy.id_materialy
                                ORDER BY transakcje_kupno.id DESC");
                            $wydatki = 0;
                            while($row_wydatki = $result_wydatki->fetch_assoc()){
                                $wydatki = $wydatki + $row_wydatki['ilosc'] * $row_wydatki['cena'];
                            }
                            echo $wydatki.' zł';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Przychody</td>
                    <td>
                        <?php
                            $result_przychody = $database->query("
                            SELECT transakcja_sprzedaz_produkty.ilosc, produkty.cena FROM transakcje_sprzedaz
                            INNER JOIN transakcja_sprzedaz_produkty
                            ON transakcje_sprzedaz.id = transakcja_sprzedaz_produkty.id_transakcje_sprzedaz
                            INNER JOIN produkty
                            ON produkty.id = transakcja_sprzedaz_produkty.id_produkty
                            ORDER BY transakcje_sprzedaz.id DESC");
                            $przychody = 0;
                            while($row_przychody = $result_przychody->fetch_assoc()){
                                $przychody = $przychody + $row_przychody['ilosc'] * $row_przychody['cena'];
                            }
                            echo $przychody.' zł';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Wartość artykułów w magazynie</td>
                        <td>
                            <?php
                                $result_material_wartosc_calkowita = $database->query("select cena, stan_magazynowy from materialy");
                                $suma = 0;
                                while($row_material_wartosc_calkowita = $result_material_wartosc_calkowita->fetch_assoc()){
                                    $suma = $suma + $row_material_wartosc_calkowita['cena'] * $row_material_wartosc_calkowita['stan_magazynowy'];
                                }
                                $result_produkt_wartosc_calkowita = $database->query("select cena, stan_magazynowy from produkty");
                                while($row_produkt_wartosc_calkowita = $result_produkt_wartosc_calkowita->fetch_assoc()){
                                    $suma = $suma + $row_produkt_wartosc_calkowita['cena'] * $row_produkt_wartosc_calkowita['stan_magazynowy'];
                                }

                                echo $suma.' zł';
                            ?>
                        </td>
                </tr>
                <tr>
                    <td>Zysk</td>
                        <td>
                            <?php
                                echo $przychody - $wydatki + $suma.' zł';
                            ?>
                    </td>
                </tr>
            </table>
        </div>
        
        <div id="wykresy">
            <div class="wykres" id="materialy_stan" style="border: 1px solid #ccc"></div>
            
            <div class="wykres" id="produkty_stan" style="border: 1px solid #ccc"></div>

            <div class="wykres" id="materialy_wartosc" style="border: 1px solid #ccc"></div>

            <div class="wykres" id="produkty_wartosc" style="border: 1px solid #ccc"></div>
        </div>
        
            
        
    </main>
</body>
<script src='main.js'></script>
</html>