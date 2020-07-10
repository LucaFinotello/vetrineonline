<?php
    session_start();
    setlocale(LC_TIME, 'italian'); // it_IT
    include("db_con.php");
    include_once('mysql-fix.php');
        $strsql = "delete from durataTurno where codiceStruttura = '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL durataTurno" . "<br>";
        } else {
            header("location:impostazioni.php");
        }
        $strsql = "delete from fascia where codiceStruttura = '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL fascia" . "<br>";
        } else {
            header("location:impostazioni.php");
        }
        $strsql = "delete from orari where codiceStruttura = '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL orari" . "<br>";
        } else {
            header("location:impostazioni.php");
        }
        $strsql = "delete from postiSala where codiceStruttura = '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL postiSala" . "<br>";
        } else {
            header("location:impostazioni.php");
        }
        $strsql = "delete from prenotazione where codiceStruttura = '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL prenotazione" . "<br>";
        } else {
            header("location:impostazioni.php");
        }
        $strsql = "delete from sala where codiceStruttura = '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL sala" . "<br>";
        } else {
            header("location:impostazioni.php");
        }
?>