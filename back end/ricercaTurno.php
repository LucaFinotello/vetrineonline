<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <div id="main">
        <h1>Prenotazione Sala</h1>
        <?php
            include ('menu.html');
        ?>
        <div id="contenuto">
            <?php
            $strsql = "select * from orari where codiceStruttura = '$codiceStruttura'";
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
                include ('ricercaPeriodo.php');
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
                        echo "<td ><input class='inputTable' name='giorno' value='".date("d/m/Y",$riga['giorno'])."'/></td>";
                        echo "<input class='inputTable' name='id' value='".$riga['id']."' hidden/>";
                        echo "<td>".$riga['fascia']."</td>";
                        echo "<td>".$riga['oraInizio']."</td>";
                        echo "<td>".$riga['oraFine']."</td>";
                        echo "<td>
                              <button type='submit' class='click' value='modifica'><i class='fa fa-pencil'></i></button></form>";
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
                ?>
                <p></p>
                <?php
                $strsql = "select * from prenotazione where codiceStruttura= '$codiceStruttura'";
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
                    ?>
                    <p></p><br>
                    <fieldset>
                        <legend>Cerca turno</legend>
                        <form action="ricercaTurno.php" method="post">
                            Giorno: <input type="date" class="inputBottom" name="data" value="<?php echo $_POST['data'] ?>" placeholder="gg/mm/aaaa">
                            Etichetta: <select name="fascia">
                                <option value="colazione">Colazione</option>
                                <option value="pranzo">Pranzo</option>
                                <option value="cena">Cena</option>
                            </select>
                            &emsp;<button class="click" type="submit"><i class="fa fa-search"></i></button>
                            <button onClick="javascript:window.location.href = 'prenotazione_sala.php'">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </fieldset>
                    <table>
                        <thead>
                        <tr>
                            <td>Giorno</td>
                            <td>Fascia</td>
                            <td>Turno</td>
                            <td>Stanza</td>
                            <td>Azioni</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="5">
                                <div class="divinterno">
                                    <table class="table-int">
                                        <?php
                                        $giorno= strtotime($_POST['data']);
                                        $fascia= $_POST['fascia'];
                    $strsql = "select * from prenotazione where giorno='$giorno' and fascia= '$fascia' and codiceStruttura= '$codiceStruttura'";
                    $risultato = mysqli_query($conn, $strsql);
                    if (! $risultato)
                    {
                        echo "Errore nel comando SQL" . "<br>";
                    }
                    $riga = mysqli_fetch_array($risultato);
                    if (! $riga)
                    {
                        echo "Nessuna corrispondenza dalla ricerca";
                    }
                    else
                    {
                                    while ($riga)
                                    {
                                        echo ("<tr>");
                                        echo "<form action='modifica.php' method='POST'>";
                                        echo "<input class='inputTable' name='id' value='".$riga['id']."' hidden/>";
                                        echo "<td>".date('d/m/Y', $riga["giorno"] )."</td>";
                                        echo "<td>".$riga['fascia']."</td>";
                                        echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turnoInizio"]." - ".$riga["turno"]."'/></td>";
                                        echo "<td>".$riga["stanza"]."</td>";
                                        echo "<td>
                                                <button type='submit' class='click' value='inserisci'><i class='fa fa-pencil'></i></button></form>";
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
                <?php }
            }
            ?>
        </div>
    </div>
<?php
    include ('footer.html');
?>