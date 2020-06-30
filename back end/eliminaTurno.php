<?php
    session_start();
    setlocale(LC_TIME, 'italian'); // it_IT
    include("db_con.php");
    include_once('mysql-fix.php');

    $id = $_POST["id"];
    $stanza = $_POST["stanza"];
    if ($stanza !== '') {
        echo '<script type="text/javascript">
			alert("Stai tentando di eliminare un turno gia occupato!")
			window.location= "prenotazione_sala.php"
			</script>';
    } else
    {
        $strsql = "select * from prenotazione where id = '$id'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "turno non presente" . "<br>";
        }
        else
        {
            $id = $_POST["id"];
            $strsql = "delete from prenotazione where id = '$id'";
            $risultato = mysqli_query($conn, $strsql);
            if (! $risultato)
            {
                echo "Errore nel comando SQL" . "<br>";
            }
            header("location:prenotazione_sala.php");
            echo "turno CANCELLATO con successo!" . "<br>";
        }
    }

?>