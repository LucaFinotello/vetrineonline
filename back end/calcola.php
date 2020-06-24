<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Vetrineonline</title>
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/prenotazione.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>
<body>
<h1>Prenotazione Sala</h1>
<div>
    <form name="gestioneOrari" action="gestioneOrari.php" method="post">
        <fieldset>
            <legend>Selezionare periodo</legend>
            <span>Da</span><input type="date" id="datepicker" name="dataInizio" value="" format="dd-mm-yyyy">
            <span>A</span><input type="date" id="datepickerA" name="dataFine" format="dd-mm-yyyy">
            &emsp;
            <button type="submit" class="click" value="compila">Compila</button>
        </fieldset>
    </form>
    <p></p>
    <?php
        $strsql = "select * from orari";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "Nessun orario inserito a database";
        }
        else
        {
            ?>
            <table id="example" class="display">
                <thead>
                <tr>
                    <td>Giorno</td>
                    <td>Fascia</td>
                    <td>Ora Inizio</td>
                    <td>Ora Fine</td>
                    <td>Modifica</td>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($riga)
                {
                    echo ("<tr>");
                    echo "<form action='modificaOrari.php' method='post'>";
                    echo "<td><input class='inputTable' class='Bordernone' name='giorno' value='".$riga['giorno']."'/></td>";
                    echo "<td>".$riga['identificazione']."</td>";
                    echo "<td>".$riga['oraInizio']."</td>";
                    echo "<td>".$riga['oraFine']."</td>";
                    echo "<td><button type='submit' class='click'>Modifica</button>";
                    echo "</form>";
                    echo ("</tr>");
                    $riga = mysqli_fetch_array($risultato);
                }
                ?>
                </tbody>
            </table>
            <?php
        }
        ?>
        <form name="ricercaOrari" action="ricercaOrari.php" method="post">
            <fieldset>
                <legend>Selezione Date</legend>
                <span>Da</span><input type="date" id="datepicker" name="dataInizio" value="" format="dd-mm-yyyy">
                <span>A</span><input type="date" id="datepickerA" name="dataFine" format="dd-mm-yyyy">
                &emsp;
                <button type="submit" class="click" value="compila">Compila</button>
            </fieldset>
        </form>
        <p></p>
        <div>
            <form name='moduloCalcolaTurni' action="calcola.php" method="post">
                <span>Numero tavoli in sala</span>&nbsp;<input class="inputBottom" type=”number” name='postiSala'>&emsp;
                <span>Durata turno</span>&nbsp;
                <select name="durataTurno">
                    <option value="0:15">0:15</option>
                    <option value="0:30">0:30</option>
                    <option value="0:45">0:45</option>
                    <option value="1:00">1:00</option>
                    <option value="1:15">1:15</option>
                    <option value="1:30">1:30</option>
                </select>
                <button type="submit" class="click" value="calcola">Calcola</button>
                <button type="button" class="click" onclick="refresh()">Annulla</button>
            </form>
        </div>
        <?php
        $strsql = "select giorno, oraInizio, oraFine from orari ";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "";
        }
        else
        {
        $postiSala= $_POST['postiSala'];
        $durataTurno = $_POST['durataTurno'];
        $giorno = $riga['giorno'];
        $oraInizio = $riga['oraInizio'];
        $oraFine = $riga['oraFine'];


        $data = date("d-m-Y", strtotime($giorno));
        $oraInizio = date("H:i", strtotime($oraInizio));
        $oraFine = date("H:i", strtotime($oraFine));
        $durataTurno = date("H:i", strtotime($durataTurno));
        $turno = date("H:i", strtotime($oraInizio) + strtotime($durataTurno) + 10800);

        $data_oggi = substr($data, 0, strlen($data));
        list($anno, $mese, $giorno) = explode("-",$data_oggi);

        $date = mktime($mese, $giorno, $anno);
        for ($i = 0; $i < 7; $i++) {
            if($turno>=$oraFine) {
               continue;
            }else{
                for ($y =$oraInizio; $y<$oraFine; $y=$turno) {
                    $turno = date("H:i", strtotime($oraInizio) + strtotime($durataTurno) + 10800);
                    $giorno = strftime('%A, %e %B %Y', $date + $i * 86400);
                    $strsql = "insert into prenotazione set giorno='$giorno', turnoInizio='$oraInizio', turno='$turno', postiSala='$postiSala'";
                    $risultato = mysqli_query($conn, $strsql);
                    $oraInizio= $turno;
                }
            }
        }

        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        else
        {
            $strsql = "select * from prenotazione ";
            $risultato = mysqli_query($conn, $strsql);
            if (! $risultato)
            {
                echo "Errore nel comando SQL" . "<br>";
            }
            $riga = mysqli_fetch_array($risultato);
            if (! $riga)
            {
                echo "";
            }
            else
            {
                ?>
                <p></p>
                <table id="example" class="display">
                    <thead>
                    <tr>
                        <td>Giorno</td>
                        <td>Turno</td>
                        <td>Stanza</td>
                        <td>Inserisci</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($riga)
                    {
                        echo ("<tr>");
                        echo "<form action='modifica.php' method='POST'>";
                        echo "<td>".$riga["giorno"]."</td>";
                        echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turnoInizio"]." - ".$riga["turno"]."'/></td>";
                        echo "<td>".$riga["stanza"]."</td>";
                        echo "<td> <button type='submit' class='click' value='inserisci'>Inserisci</button> </td>";
                        echo "</form>";
                        echo ("</tr>");
                        $riga = mysqli_fetch_array($risultato);
                    }
                    ?>
                    </tbody>
                </table>
                <p></p><br>
            <?php }
             }
        }
        ?>
</div>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "pagingType": "full_numbers"
        } );
    } );
</script>