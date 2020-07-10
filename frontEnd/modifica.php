<?php
if(!isset($_SESSION))
{
    session_start();
}
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
include ('menu.html');
?>
    <h1>Inserisci Prenotazione</h1>
    <?php
        if ($codiceStruttura=='H001') {
            $id = $_POST["id"];
            $turno = $_POST["turno"];
            $strsql = "select * from prenotazione where codiceStruttura='$codiceStruttura' and id = '$id'";
            $risultato = mysqli_query($conn, $strsql);
            if (! $risultato)
            {
                echo "Errore nel comando SQL" . "<br>";
            }
            $riga = mysqli_fetch_array($risultato);
            if (! $riga)
            {
                echo "Turno assente" . "<br>";
            }
            else
            {
                ?>
                <form action="test.php" method="POST" >
                    <div class="prenotazione">
                        Data: <input class="inputBottom" name="giorno" type="text" value="<?php echo date('d/m/Y',$riga["giorno"])?>"><br>
                        Fascia: <input class="inputBottom" name="fascia" type="text" readonly value="<?php echo $riga["fascia"]?>"><br>
                        Turno: <input class="inputBottom" name="turno" type="text" readonly value="<?php echo $riga["turnoInizio"]?> - <?php echo $riga["turno"]?>"><br>
                        Stanza: <input class="inputBottom" name="stanza" type="text" value="<?php echo substr($riga["stanza"], 2)?>"><br><br>
                        <input class="inputBottom" name="disponibilita" type="text" value="<?php echo $riga["disponibilita"]?>" hidden>
                        <input class="inputBottom" name="id" type="text" value="<?php echo $riga["id"]?>" hidden>
                        <button type="submit" class="click" value="Invia" name="Invio">Prenota</button>
                        <button type="reset" class="click">
                            <a href="index.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
                        </button>
                    </div>
                </form>
                <?php
            }
        } else {
            $giorno = $_POST['giorno'];
            $turno = $_POST["turno"];
            echo("<table>");

            $query = "SELECT * FROM sala WHERE giorno = '$giorno' and turno = '$turno' and codiceStruttura = '$codiceStruttura'";
            $numero_colonne = 1;
            $results = mysqli_query($conn, $query) or die (mysqli_error($conn));
            if (mysqli_num_rows($results) != 0) {
                while ($row = mysqli_fetch_array($results)) {
                    $giorno = date('d/m/Y', $row['giorno']);
                    $posto = $row['id'];
                    $numeroTavolo = $row['numeroTavolo'];
                    $nome = $row['nome'];
                    $posti = $row['postiTavolo'];
                    $fascia = $row['fascia'];
                    $turno = $row['turno'];
                    $dispo = $row['disponibilita'];
                    if ($numero_colonne <= 10) {
                        $numero_colonne++;
                        if ($dispo == 1) {
                            echo("<td class='postazioni_libere' >N Tavolo: $numeroTavolo <br> <b>$giorno</b> <br>Posti: $posti Turno: $turno Fascia: $fascia  
                                            <form action='prenotaTavolo.php' method='post'>
                                                <input name='id' value='$posto' hidden>
                                                <input type='text' name='nome' required/>
                                                <input type='checkbox' name='prenota' value='0' required/></input>
                                                <button type='submit'>Prenota</button>
                                            </form>
                                                </td>");
                        } else {
                            echo("<td class='postazioni_occupate' >N Tavolo: $numeroTavolo <br> posti $posti 
                                    <form action='prenotaTavolo.php' method='post'>
                                                <input name='id' value='$posto' hidden>
                                                <input class='inputPrenotazione' name='nome' value='$nome' readonly>
                                            </form>
                                    </td>");
                        }
                    }
                    if ($numero_colonne == 10) {
                        $numero_colonne = 1;
                        if ($dispo == 1) {
                            echo("<td class='postazioni_libere' >N Tavolo: $numeroTavolo <br> posti $posti 
                                        <form action='prenotaTavolo.php' method='post'>
                                                <input name='id' value='$posto' hidden>
                                                <input type='checkbox' name='prenota' value='0' required/></input>
                                                <button type='submit'>Prenota</button>
                                            </form>
                                        </td></tr>");
                        } else {
                            echo("<td class='postazioni_occupate' > N Tavolo: $numeroTavolo <br> posti $posti 
                                    <form action='prenotaTavolo.php' method='post'>
                                                <input name='id' value='$posto'>
                                                <input type='checkbox' name='prenota' value='0' required/></input>
                                                <button type='submit'>Libera</button>
                                            </form>
                                    </td></tr>");
                        }
                    }
                }
            }
            echo "</table>";
            echo "<button><a href='index.php' style='text-decoration: none'>Annulla</a></button>";
            echo "</div></div>";
        }
    ?>
    </body>
</html>
