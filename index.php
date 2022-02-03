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

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawSarahChart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawAnthonyChart);

      // Callback that draws the pie chart for Sarah's pizza.
      function drawSarahChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Materiał');
        data.addColumn('number', 'StanMagazynowy');
        data.addRows([
          ['Patyk', 1],
          ['Kamień', 1],
          ['Żelazo', 2],
          ['Diament', 2],
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Aktualny stan magazynowy materiałów',
                       width:450,
                       height:450,
                       backgroundColor:'transparent',
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

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function drawAnthonyChart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Produkt');
        data.addColumn('number', 'StanMagazynowy');
        data.addRows([
          ['Mushrooms', 2],
          ['Onions', 2],
          ['Olives', 2],
          ['Zucchini', 0],
          ['Pepperoni', 3]
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Aktualny stan magazynowy produktów',
                       width:450,
                       height:450,
                       backgroundColor:'transparent',
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

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
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
        
        <div id="wykresy">
            <div class="wykres" id="Sarah_chart_div" style="border: 1px solid #ccc"></div>
            
            <div class="wykres" id="Anthony_chart_div" style="border: 1px solid #ccc"></div>
        </div>
        
            
        
    </main>
</body>
<script src='main.js'></script>
</html>