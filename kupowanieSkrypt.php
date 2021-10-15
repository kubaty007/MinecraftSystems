<?php

    session_start();
    $database = @new mysqli('localhost', 'root', '', 'minecraftsystems');

    if($database->connect_errno!=0){
        echo "Nastąpił problem z połączeniem! <br/> Error: ".$database->connect_errno;
        exit();
    } else {
        $database->query("set names utf8");

        if(!empty($_POST['Kamień']) || !empty($_POST['Żelazo']) || !empty($_POST['Diament']) || !empty($_POST['Patyk'])){

            $database->query("INSERT INTO transakcje_kupno (data) VALUES ('".date('Y-m-d H:i:s')."')");

            $id_transakcji = $database->insert_id;

            if(!empty($_POST['Kamień'])){

                $kamien=$_POST['Kamień'];

                $database->query("INSERT INTO transakcja_kupno_materialy (id_transakcje_kupno, id_materialy, ilosc) 
                VALUES ($id_transakcji, 0, $kamien);");

                $database->query("UPDATE materialy 
                SET materialy.stan_magazynowy = materialy.stan_magazynowy + $kamien
                WHERE materialy.id=0");
            }

            if(!empty($_POST['Żelazo'])){

                $zelazo=$_POST['Żelazo'];

                $database->query("INSERT INTO transakcja_kupno_materialy (id_transakcje_kupno, id_materialy, ilosc) 
                VALUES ($id_transakcji, 1, $zelazo);");

                $database->query("UPDATE materialy 
                SET materialy.stan_magazynowy = materialy.stan_magazynowy + $zelazo
                WHERE materialy.id=1");
            }

            if(!empty($_POST['Diament'])){

                $diament=$_POST['Diament'];

                $database->query("INSERT INTO transakcja_kupno_materialy (id_transakcje_kupno, id_materialy, ilosc) 
                VALUES ($id_transakcji, 2, $diament);");

                $database->query("UPDATE materialy 
                SET materialy.stan_magazynowy = materialy.stan_magazynowy + $diament
                WHERE materialy.id=2");
            }
            if(!empty($_POST['Patyk'])){

                $patyk=$_POST['Patyk'];

                $database->query("INSERT INTO transakcja_kupno_materialy (id_transakcje_kupno, id_materialy, ilosc) 
                VALUES ($id_transakcji, 3, $patyk);");

                $database->query("UPDATE materialy 
                SET materialy.stan_magazynowy = materialy.stan_magazynowy + $patyk
                WHERE materialy.id=3");
            }
        }
        //echo $id_transakcji." kamien ".$kamien." zelazo ".$zelazo;
        header("Location: zakup.php");
    }
?>