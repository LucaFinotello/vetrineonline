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
                include ('ricercaPeriodo.html');
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
                        echo "<td>".$riga['identificazione']."</td>";
                        echo "<td>".$riga['oraInizio']."</td>";
                        echo "<td>".$riga['oraFine']."</td>";
                        echo "<td>
                                   <button type='submit' class='click'>Modifica</button></form>";
                        echo "<form action='eliminaGiorno.php' method='post'>";
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
                        <p></p><br>
                          ";
                }
                else
                {
                    ?>
                    <p></p><br>
                    <fieldset>
                        <legend>Cerca turno</legend>
                        <form action="ricercaTurno.php" method="post">
                            Giorno: <input type="date" class="inputBottom" name="data" value="" placeholder="gg/mm/aaaa">
                            <!--Etichetta: <select name="fascia">
                                <option value="colazione">Colazione</option>
                                <option value="pranzo">Pranzo</option>
                                <option value="cena">Cena</option>
                            </select>-->
                            &emsp;<button class="click" type="submit">Cerca</button>
                        </form>
                    </fieldset>
                    <table>
                        <thead>
                        <tr>
                            <th>Giorno</th>
                            <th>Turno</th>
                            <th>Stanza</th>
                            <th>Inserisci</th>
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
                            echo "<td> <button type='submit' class='click'>Inserisci</button> </td>";
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
                    <p></p><br>
                <?php }
                ?>
    </div>
</div>
</body>
</html>