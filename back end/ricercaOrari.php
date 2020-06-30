<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
 <div id="main">
        <h1>Prenotazione Sala</h1>
     <?php include ('menu.html');?>
        <div id="contenuto">
            <?php
            $strsql = "select * from orari where codiceStruttura= '$codiceStruttura' order by giorno";;
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
                include('ricercaPeriodo.php');
                ?>
                <table>
                <thead>
                <tr>
                    <td style="245 px;">Giorno</td>
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
                $dataInizio = strtotime($_POST['dataInizio']);
                $dataFine = strtotime($_POST['dataFine']);
                $fascia = $_POST['fascia'];
                $strsql = "select * from orari where giorno=$dataInizio or fascia='$fascia' and codiceStruttura = '$codiceStruttura'";
                $risultato = mysqli_query($conn, $strsql);
                if (! $risultato)
                {
                    echo "Errore nel comando SQL" . "<br>";
                }
                $riga = mysqli_fetch_array($risultato);
                if (! $riga)
                {
                    echo "Nessun risultato trovato";
                }
                else
                {
                    while ($riga)
                    {
                        echo ("<tr>");
                        echo "<form action='modificaOrari.php' method='post'>";
                        echo "<td style='200px;'><input class='inputTable' name='giorno' value='".date("d/m/Y",$riga['giorno'])."'/></td>";
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
                ?>
                <p></p>
                <?php
                $strsql = "select * from prenotazione where codiceStruttura = '$codiceStruttura' order by giorno";
                $risultato = mysqli_query($conn, $strsql);
                if (! $risultato)
                {
                    echo "Errore nel comando SQL" . "<br>";
                }
                $riga = mysqli_fetch_array($risultato);
                if (! $riga)
                {
                    include ('tabellaVuotaTurni.html');
                }
                else
                {
                   include ('cercaTurno.html');
                   include ('turni.php');
                }
            }
            ?>
        </div>
 </div>
<?php
    include ('footer.html');
?>