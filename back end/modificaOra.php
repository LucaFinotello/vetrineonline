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
        <?php
            $giorno = $_POST["giorno"];
            $fascia = $_POST["identificatore"];
            $oraInizio = $_POST["oraInizio"];
            $oraFine = $_POST["oraFine"];
            $strsql = "update orari set identificazione='$fascia', oraInizio='$oraInizio', oraFine='$oraFine'  where giorno = '$giorno'";
            $risultato = mysqli_query($conn, $strsql);
            if (!$risultato)
              {
               echo "Errore nel comando SQL" . "<br>";
              } else {
                ?>
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
        $strsql = "select * from orari where codiceStruttura='H001'";
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
        <p></p><br>
        <table id="turni" class="display">
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
                echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turno"]."'></input></td>";
                echo "<td>".$riga["stanza"]."</td>";
                echo "<td> <button type='submit' class='click' value='inserisci'>Inserisci</button> </td>";
                echo "</form>";
                echo ("</tr>");
                $riga = mysqli_fetch_array($risultato);
            }
            ?>
            </tbody>
        </table>
        <?php }
            }
        ?>
    </body>
</html>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "pagingType": "full_numbers"
        } );
    } );
    $(document).ready(function() {
        $('#turni').DataTable( {
            "pagingType": "full_numbers"
        } );
    } );
</script>