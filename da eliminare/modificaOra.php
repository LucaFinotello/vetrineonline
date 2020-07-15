<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include('header.html')
?>
    <div id="main">
        <h1>Prenotazione Sala</h1>
        <?php
include('menu.html')
        ?>
        <div id="contenuto">
        <?php
            $id = $_POST["id"];
            $giorno = $_POST["giorno"];
            $fascia = $_POST["identificatore"];
            $oraInizio = $_POST["oraInizio"];
            $oraFine = $_POST["oraFine"];
            $strsql = "update orari set fascia='$fascia', oraInizio='$oraInizio', oraFine='$oraFine' where id = '$id'";
            $risultato = mysqli_query($conn, $strsql);
            if (!$risultato)
              {
               echo "Errore nel comando SQL" . "<br>";
              } else {



                $strsql = "delete from prenotazione where giorno= '$giorno'";
                $risultato = mysqli_query($conn, $strsql);
                if (! $risultato)
                {
                    echo "Errore nel comando SQL" . "<br>";
                } else {
                    $id = $riga['id'];
                    $giorno = $_POST['giorno'];
                    $giorno = strtotime($_POST['giorno']);

                    $oraInizioA = date("H:i", strtotime($oraInizio));
                    $oraFine = date("H:i", strtotime($oraFine));
                    $durataTurno = date("H:i", strtotime($durataTurno));
                    $turno = date("H:i", strtotime($oraInizio) + strtotime($durataTurno) + 10800);

                    for ($i = $giorno; $i <= $giorno; $i = $i + 86400) {
                        while ($oraInizioA < $oraFine) {
                            $turno = date("H:i", strtotime($oraInizioA) + strtotime($durataTurno) + 10800);
                            $strsql = "insert into prenotazione set giorno='$giorno', turnoInizio='$oraInizioA', turno='$turno', 
                                            
                                            codiceStruttura='$codiceStruttura', id_orari='$id'";
                            $risultato = mysqli_query($conn, $strsql);
                            $oraInizioA = $turno;
                        }
                        $giorno = $giorno + 86400;
                        $oraInizioA = date("H:i", strtotime($oraInizio));
                    }

                    if (!$risultato) {
                        echo "Errore query inserimento turni" . "<br>";
                    } else {
                        header('location:prenotazione_sala.php');
                    }
                }





            }
?>