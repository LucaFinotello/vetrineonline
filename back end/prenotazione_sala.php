<?php
session_start();
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');
include('header.html');
?>
<div id="main">
    <h1>Prenotazione Sala</h1>
    <?php include ('menu.html');

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
                include('ricercaPeriodo.php');
                ?>
                <table class="table-ext">
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
                        echo "<tr>";
                        echo "<form action='modificaOrari.php' method='post'>";
                        echo "<input class='inputTable' name='id' value='".$riga['id']."' hidden/>";
                        echo "<td><input class='inputTable' value='".date('d/m/Y', $riga['giorno'])."'/></td>";
                        echo "<td>".$riga['fascia']."</td>";
                        echo "<td>".$riga['oraInizio']."</td>";
                        echo "<td>".$riga['oraFine']."</td>";
                        echo "<td>
                                   <button type='submit' class='click'>Modifica</button></form>";
                        echo "<form action='eliminaGiorno.php' method='post' class='elimina'>";
                        echo "<input class='inputTable' name='id' value='".$riga['id']."' hidden/>";
                        echo "<button class='sumbit'>Elimina</button>
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
            ?>
            <p></p>
            <div>
                <?php
                $strsql = "select * from prenotazione where codiceStruttura= '$codiceStruttura' order by giorno";
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
                    include('turni.php');
                }
            ?>
    </div>
</div>
<?php
    include ('footer.html');
?>