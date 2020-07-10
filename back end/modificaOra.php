<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html')
?>
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
            $strsql = "update orari set fascia='$fascia', oraInizio='$oraInizio', oraFine='$oraFine' where id = '$id'";
            $risultato = mysqli_query($conn, $strsql);
            if (!$risultato)
              {
               echo "Errore nel comando SQL" . "<br>";
              } else {

        $strsql = "select * from orari where codiceStruttura='$codiceStruttura'";
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
                        <td>Azioni</td>
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
                <td>Azioni</td>
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
                echo "<td>".$riga['fascia']."</td>";
                echo "<td>".$riga['oraInizio']."</td>";
                echo "<td>".$riga['oraFine']."</td>";
                echo "<td>
                                   <button type='submit' class='click'><i class='fa fa-pencil'></i></button></form>";
                        echo "<form action='eliminaGiorno.php' method='post' class='elimina'>";
                        echo "<input class='inputTable' name='id' value='".$riga['id']."' hidden/>";
                        echo "<button class='sumbit'><i class='fa fa-trash'></i></button>
                              </form>
                              </td>";
                        echo "</tr>";
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