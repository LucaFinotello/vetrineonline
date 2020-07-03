<?php
    session_start();
    setlocale(LC_TIME, 'italian'); // it_IT
    include("db_con.php");
    include_once('mysql-fix.php');
    include ('header.html');
?>
    <div id="contenuto">
        <?php
        $fascia= $_POST ['fascia'];
        $oraInizio = $_POST['oraInizio'];
        $oraFine = $_POST['oraFine'];
        $dataInizio = strtotime($_POST["dataInizio"]);
        $datafine = strtotime($_POST["dataFine"]);
        $postiSala= $_POST['postiSala'];
        $durataTurno = $_POST['durataTurno'];

        $oggi= strtotime($_POST['dataInizio']);
        $dataTermine= strtotime($_POST['dataFine']);

        $strsql = "select * from orari where giorno BETWEEN '$dataInizio' AND '$dataTermine' and fascia='$fascia' 
                and codiceStruttura = '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            for ($i = $oggi; $i <= $dataTermine; $i=$i+86400) {
                $giorno=$i;
                $strsql = "insert into orari SET giorno='$giorno', oraInizio= '$oraInizio', oraFine= '$oraFine',
                                        fascia= '$fascia', codiceStruttura= '$codiceStruttura'";
                $risultato = mysqli_query($conn, $strsql);
            }

            if (!$risultato)
            {
                include ('impostazioni.php');
                echo "Errore nel comando SQL" . "<br>";
            }
            else
            {
                $strsql = "select * from orari where codiceStruttura= '$codiceStruttura' order by giorno";
                $risultato = mysqli_query($conn, $strsql);
                if (! $risultato)
                {
                    echo "Errore nel comando SQL" . "<br>";
                }
                $riga = mysqli_fetch_array($risultato);
                if (! $riga)
                {
                    include ('tabellaVuotaOrari.html');
                }
                else
                {
                    echo "<input class='inputTable' name='id' value='".$riga['id']."' hidden/>";
                    $riga = mysqli_fetch_array($risultato);
                    $id = $riga['id'];
                    $giorno = $_POST['dataInizio'];
                    $giorno= strtotime($_POST['dataInizio']);

                    $oraInizioA = date("H:i", strtotime($oraInizio));
                    $oraFine = date("H:i", strtotime($oraFine));
                    $durataTurno = date("H:i", strtotime($durataTurno));
                    $turno = date("H:i", strtotime($oraInizio) + strtotime($durataTurno) + 10800);

                    for ($i = $giorno; $i <= $dataTermine; $i=$i+86400) {
                        if($oraInizioA<$oraFine) {
                            $turno = date("H:i", strtotime($oraInizioA) + strtotime($durataTurno) + 10800);
                            $strsql = "insert into prenotazione set giorno='$giorno', turnoInizio='$oraInizioA', turno='$turno', 
                                            fascia='$fascia', postiSala='$postiSala', disponibilita='$postiSala',
                                            codiceStruttura='$codiceStruttura', id_orari='$id'";
                            $risultato = mysqli_query($conn, $strsql);
                            $oraInizioA = $turno;
                        } else {
                            $giorno = $giorno+86400;
                            $oraInizioA = date("H:i", strtotime($oraInizio));
                        }
                    }

                    if (!$risultato)
                    {
                        include ('impostazioni.php');
                        echo "Errore query inserimento turni" . "<br>";
                    }
                    else
                    {
                        include ('impostazioni.php');
                        echo "Inserimento avvenuto con successo" ."<br>";
                    }
                }
            }
        }
        else {
            echo "<script>
                  var r = confirm(\"i dati verranno sovrascritti, vuoi continuare?\");
                  if (r == true) {
                  
                  } else {
                    location.href('prenoteazione_sala.php')
                  }
                }
                </script>";

            for ($i = $oggi; $i <= $dataTermine; $i=$i+86400) {
            $giorno=$i;
            $strsql = "update orari SET oraInizio= '$oraInizio', oraFine= '$oraFine' where giorno = '$giorno'";
            $risultato = mysqli_query($conn, $strsql);
        }

        if (!$risultato)
        {
            include ('impostazioni.php');
            echo "Errore nel comando SQL" . "<br>";
        }
        else
        {
            $strsql = "select * from orari where codiceStruttura= '$codiceStruttura' order by giorno";
            $risultato = mysqli_query($conn, $strsql);
            if (! $risultato)
            {
                echo "Errore nel comando SQL" . "<br>";
            }
            $riga = mysqli_fetch_array($risultato);
            if (! $riga)
            {
                include ('tabellaVuotaOrari.html');
            }
            else
            {
                $strsql = "delete from prenotazione where giorno= '$giorno'";
                $risultato = mysqli_query($conn, $strsql);
                if (! $risultato)
                {
                    echo "Errore nel comando SQL" . "<br>";
                } else {
                    $id = $riga['id'];
                    $giorno = $_POST['dataInizio'];
                    $giorno = strtotime($_POST['dataInizio']);

                    $oraInizioA = date("H:i", strtotime($oraInizio));
                    $oraFine = date("H:i", strtotime($oraFine));
                    $durataTurno = date("H:i", strtotime($durataTurno));
                    $turno = date("H:i", strtotime($oraInizio) + strtotime($durataTurno) + 10800);

                    for ($i = $giorno; $i <= $dataTermine; $i = $i + 86400) {
                        if ($oraInizioA < $oraFine) {
                            $turno = date("H:i", strtotime($oraInizioA) + strtotime($durataTurno) + 10800);
                            $strsql = "insert into prenotazione set giorno='$giorno', turnoInizio='$oraInizioA', turno='$turno', 
                                            fascia='$fascia', postiSala='$postiSala', disponibilita='$postiSala',
                                            codiceStruttura='$codiceStruttura', id_orari='$id'";
                            $risultato = mysqli_query($conn, $strsql);
                            $oraInizioA = $turno;
                        } else {
                            $giorno = $giorno + 86400;
                            $oraInizioA = date("H:i", strtotime($oraInizio));
                        }
                    }

                    if (!$risultato) {
                        include('impostazioni.php');
                        echo "Errore query inserimento turni" . "<br>";
                    } else {
                        include('impostazioni.php');
                        echo "Modifica avvenuta con successo" . "<br>";
                    }
                }
            }
        }
        }
        ?>
    </div>
<?php
    include ('footer.html');
?>