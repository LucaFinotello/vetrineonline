<?php
    session_start();
    setlocale(LC_TIME, 'italian'); // it_IT
    include("db_con.php");
    include_once('mysql-fix.php');
    include ('header.html');

    $id = $_POST["id"];
    $strsql = "select * from orari where id = '$id'";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "giorno non presente" . "<br>";
    }
    else
    {
        $strsql = "select * from orari, prenotazione where id_orari = '$id'";
        if ($id === '') {
            echo '<script type="text/javascript">
			alert("Stai tentando di eliminare un giorno con turni prenotati!")
			window.location= "prenotazione_sala.php"
			</script>';
        }
        $id = $_POST["id"];
        $strsql = "delete from orari where id = '$id'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        header("location:prenotazione_sala.php");
        echo "giorno CANCELLATO con successo!" . "<br>";
    }
    include ('footer.html');
?>