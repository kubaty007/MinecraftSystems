<?php  

    session_start();

    $database = @new mysqli('localhost', 'root', '', 'minecraftsystems');

    if($database->connect_errno!=0){
        echo "Nastąpił problem z połączeniem! <br/> Error: ".$database->connect_errno;
        exit();
    } else {
        $database->query("set names utf8");
    }

    $ilosc_produktu = $_POST['ilosc_produktu'];

    $result_wymagana_ilosc = $database->query("SELECT materialy.id, receptura_materialy.wymagana_ilosc FROM produkty
    INNER JOIN receptury
    ON produkty.id = receptury.id_produkty
    INNER JOIN receptura_materialy
    ON receptury.id = receptura_materialy.id_receptury
    INNER JOIN materialy
    ON materialy.id = receptura_materialy.id_materialy
    WHERE produkty.nazwa = '".$_SESSION['nazwa_produktu']."';");
    while($row_wymagana_ilosc = $result_wymagana_ilosc->fetch_assoc()){

        $calkowita_wymagana_ilosc = $row_wymagana_ilosc['wymagana_ilosc'] * $ilosc_produktu;

        $database->query("UPDATE materialy
        SET materialy.stan_magazynowy = materialy.stan_magazynowy - $calkowita_wymagana_ilosc
        WHERE materialy.id = ".$row_wymagana_ilosc['id'].";");
    }

    $database->query("UPDATE produkty
    SET produkty.stan_magazynowy = produkty.stan_magazynowy + $ilosc_produktu
    WHERE produkty.nazwa = '".$_SESSION['nazwa_produktu']."';");

    header("Location: magazyn.php");

?>