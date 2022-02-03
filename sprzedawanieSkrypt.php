<?php

    session_start();
    $database = @new mysqli('localhost', 'root', '', 'minecraftsystems');

    if($database->connect_errno!=0){
        echo "Nastąpił problem z połączeniem! <br/> Error: ".$database->connect_errno;
        exit();
    } else {
        $database->query("set names utf8");

        
        if(!empty($_POST['0']) || !empty($_POST['1']) || !empty($_POST['2']) || !empty($_POST['3']) || !empty($_POST['4']) || !empty($_POST['5']) || !empty($_POST['6']) || !empty($_POST['7']) || !empty($_POST['8']) || !empty($_POST['9']) || !empty($_POST['10']) || !empty($_POST['11'])){
            
            $database->query("INSERT INTO transakcje_sprzedaz (data) VALUES ('".date('Y-m-d H:i:s')."')");

            $id_transakcji = $database->insert_id;

            if(!empty($_POST['0'])){

                $kamienny_miecz_ilosc = $_POST['0'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 0, $kamienny_miecz_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $kamienny_miecz_ilosc
                WHERE produkty.id=0");
            }

            if(!empty($_POST['1'])){

                $zelazny_miecz_ilosc = $_POST['1'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 1, $zelazny_miecz_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $zelazny_miecz_ilosc
                WHERE produkty.id=1");
            }

            if(!empty($_POST['2'])){

                $diamentowy_miecz_ilosc = $_POST['2'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 2, $diamentowy_miecz_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $diamentowy_miecz_ilosc
                WHERE produkty.id=2");
            }

            if(!empty($_POST['3'])){

                $kamienny_kilof_ilosc = $_POST['3'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 3, $kamienny_kilof_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $kamienny_kilof_ilosc
                WHERE produkty.id=3");
            }

            if(!empty($_POST['4'])){

                $zelazny_kilof_ilosc = $_POST['4'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 4, $zelazny_kilof_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $zelazny_kilof_ilosc
                WHERE produkty.id=4");
            }

            if(!empty($_POST['5'])){

                $diamentowy_kilof_ilosc = $_POST['5'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 5, $diamentowy_kilof_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $diamentowy_kilof_ilosc
                WHERE produkty.id=5");
            }

            if(!empty($_POST['6'])){

                $kamienna_siekiera_ilosc = $_POST['6'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 6, $kamienna_siekiera_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $kamienna_siekiera_ilosc
                WHERE produkty.id=6");
            }

            if(!empty($_POST['7'])){

                $zelazna_siekiera_ilosc = $_POST['7'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 7, $zelazna_siekiera_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $zelazna_siekiera_ilosc
                WHERE produkty.id=7");
            }

            if(!empty($_POST['8'])){

                $diamentowa_siekiera_ilosc = $_POST['8'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 8, $diamentowa_siekiera_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $diamentowa_siekiera_ilosc
                WHERE produkty.id=8");
            }

            if(!empty($_POST['9'])){

                $kamienna_lopata_ilosc = $_POST['9'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 9, $kamienna_lopata_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $kamienna_lopata_ilosc
                WHERE produkty.id=9");
            }

            if(!empty($_POST['10'])){

                $zelazna_lopata_ilosc = $_POST['10'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 10, $zelazna_lopata_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $zelazna_lopata_ilosc
                WHERE produkty.id=10");
            }

            if(!empty($_POST['11'])){

                $diamentowa_lopata_ilosc = $_POST['11'];

                $database->query("INSERT INTO transakcja_sprzedaz_produkty (id_transakcje_sprzedaz, id_produkty, ilosc) 
                VALUES ($id_transakcji, 11, $diamentowa_lopata_ilosc);");

                $database->query("UPDATE produkty 
                SET produkty.stan_magazynowy = produkty.stan_magazynowy - $diamentowa_lopata_ilosc
                WHERE produkty.id=11");
            }
            header("Location: sprzedaz.php");
        }
        

    }
?>