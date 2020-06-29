<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
 <div id="main">
        <h1>Prenotazione Sala</h1>
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
                $strsql = "select * from orari where giorno=$dataInizio and codiceStruttura = '$codiceStruttura'";
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
                    echo "<p></p><br>
                           <table>
                        <thead>
                        <tr>
                            <td>Giorno</td>
                            <td>Turno</td>
                            <td>Stanza</td>
                            <td>Inserisci</td>
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
                    ?>
                    <p></p><br>
                    <fieldset>
                        <legend>Cerca turno</legend>
                        <form action="ricercaturno.php" method="post">
                            Giorno: <input type="date" class="inputBottom" name="data" value="" placeholder="gg/mm/aaaa">
                            <!--Etichetta: <select name="fascia">
                                <option value="colazione">Colazione</option>
                                <option value="pranzo">Pranzo</option>
                                <option value="cena">Cena</option>
                            </select>-->
                            &emsp;
                            <button class="click">
                                <a href="prenotazione_sala.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
                            </button>
                        </form>
                    </fieldset>
                    <table>
                        <thead>
                        <tr>
                            <td>Giorno</td>
                            <td>Turno</td>
                            <td>Stanza</td>
                            <td>Inserisci</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="4">
                                <div class="divinterno">
                                    <table class="table-int">
                        <?php
                        while ($riga)
                        {
                            echo ("<tr>");
                            echo "<form action='modifica.php' method='POST'>";
                            echo "<td>".date('d/m/Y', $riga["giorno"])."</td>";
                            echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turnoInizio"]." - ".$riga["turno"]."'/></td>";
                            echo "<td>".$riga["stanza"]."</td>";
                            echo "<td> <button type='submit' class='click' value='inserisci'>Inserisci</button> </td>";
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
                <?php }
            }
            ?>
        </div>
 </div>
<?php
    include ('footer.html');
?>