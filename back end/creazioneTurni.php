<?php
    session_start();
    setlocale(LC_TIME, 'italian'); // it_IT
    include("db_con.php");
    include_once('mysql-fix.php');
    include ('header.html');
?>
    <div id="contenuto">
        <?php
        $identificatore= $_POST ['identificatore'];
        $oraInizio = $_POST['oraInizio'];
        $oraFine = $_POST['oraFine'];
        $dataInizio = strtotime($_POST["dataInizio"]);
        $datafine = strtotime($_POST["dataFine"]);
        $postiSala= $_POST['postiSala'];
        $durataTurno = $_POST['durataTurno'];

        $oggi= strtotime($_POST['dataInizio']);
        $dataTermine= strtotime($_POST['dataFine']);


        for ($i = $oggi; $i <= $dataTermine; $i=$i+86400) {
            $giorno=$i;
            $strsql = "insert into orari SET giorno='$giorno', oraInizio= '$oraInizio', oraFine= '$oraFine',
                        identificazione= '$identificatore', codiceStruttura= '$codiceStruttura'";
            $risultato = mysqli_query($conn, $strsql);
        }

        $query_tabella = "SELECT * FROM orari where codiceStruttura = '$codiceStruttura'";
        $tabella = mysqli_query($conn, $query_tabella) or die(mysql_error());
        $row_tabella = mysqli_fetch_assoc($tabella);
        $totalRows_tabella = mysqli_num_rows($tabella);
        //echo $totalRows_tabella;


        //echo date('d/m/Y', $giorno);

        $oraInizio = date("H:i", strtotime($oraInizio));
        $oraFine = date("H:i", strtotime($oraFine));
        $durataTurno = date("H:i", strtotime($durataTurno));
        $turno = date("H:i", strtotime($oraInizio) + strtotime($durataTurno) + 10800);

        /*for ($i = 0; $i < $totalRows_tabella; $i++) {
            $turno = date("H:i", strtotime($oraInizio) + strtotime($durataTurno) + 10800);
            $strsql = "insert into prenotazione set giorno='$giorno', turnoInizio='$oraInizio', turno='$turno', postiSala='$postiSala', disponibilita='$postiSala',
            codiceStruttura='$codiceStruttura'";
            $risultato = mysqli_query($conn, $strsql);
            $oraInizio = $turno;
            $giorno +=86400;
        }*/

        if (!$risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        else
        {
            include ('impostazioni.php');
            echo "inserimento avvenuto con successo";
        }
        ?>
    </div>
</body>
</html>