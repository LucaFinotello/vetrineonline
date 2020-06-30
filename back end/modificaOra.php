<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html')
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
    <div id="main">
        <h1>Prenotazione Sala</h1>
        <?php
            include ('menu.html')
        ?>
        <div id="contenuto">
        <?php
            $id = $_POST["id"];
            $giorno = $_POST["giorno"];
            $fascia = $_POST["identificatore"];
            $oraInizio = $_POST["oraInizio"];
            $oraFine = $_POST["oraFine"];
            $strsql = "update orari set identificazione='$fascia', oraInizio='$oraInizio', oraFine='$oraFine'  where id = '$id'";
            $risultato = mysqli_query($conn, $strsql);
            if (!$risultato)
              {
               echo "Errore nel comando SQL" . "<br>";
              } else {

        $strsql = "select * from orari where codiceStruttura='H001'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "<br><table>
                    <thead>
                    <tr>
                        <td>Giorno</td>
                        <td>Fascia</td>
                        <td>Ora Inizio</td>
                        <td>Ora Fine</td>
                        <td>Modifica</td>
                    </tr>
                    </thead>
                    <tbody >
                        <tr>
                            <td colspan='5'>Ops!! Nessun dato inserito</td>
                        </tr>
                    </tbody>
                    </table>";
        }
        else
        {
            include('ricercaPeriodo.php');
            ?>
        <table>
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
            <tr>
                <td colspan="5">
                    <div class="divinterno">
                        <table class="table-int">
            <?php
            while ($riga)
            {
                echo ("<tr>");
                echo "<form action='modificaOrari.php' method='post'>";
                echo "<td><input class='inputTable' class='Bordernone' name='giorno' value='".date('d/m/Y', $riga['giorno'])."'/></td>";
                echo "<input class='inputTable' name='id' value='".$riga['id']."' hidden/>";
                echo "<td>".$riga['identificazione']."</td>";
                echo "<td>".$riga['oraInizio']."</td>";
                echo "<td>".$riga['oraFine']."</td>";
                echo "<td><button type='submit' class='click'>Modifica</button>";
                echo "</form>";
                echo ("</tr>");
                $riga = mysqli_fetch_array($risultato);
            }
            ?>
        </table>
        </div>
        </td>
        </tr>
            </tbody>
        </table>
        <?php
        }

        $strsql = "select * from prenotazione ";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "
            <p></p><br>
                           <table id='turni' class='display'>
                        <thead>
                        <tr>
                            <td>Giorno</td>
                            <td>Turno</td>
                            <td>Stanza</td>
                            <td>Azioni</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td colspan='4'>Ops!!! Nessun dato inserito</td>
                        </tr>
                        </tbody>
                        </table>
                        <p></p><br>";
        }
        else
        {
            include ('cercaTurno.html');
            include ('turni.php');
        }

            }
            include ('footer.html')
?>