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
                $num=count(explode(" ", $riga["stanza"]));
                $disponibilita = $riga['postiSala'];
                ?>
                <form action="test.php" method="POST" >
                    <div class="prenotazione">
                        Data: <input class="inputBottom" id="data" name="giorno" type="text" value="<?php echo date('d/m/Y',$riga["giorno"])?>"><br>
                        Turno: <input class="inputBottom" id="turno" name="turno" type="text" readonly value="<?php echo $riga["turnoInizio"]?> - <?php echo $riga["turno"]?>"><br>
                        <input class="inputBottom" id="stanza" name="stanza" type="text" value="<?php echo $riga["stanza"]?>" hidden>
                        <input class="inputBottom" id="fascia" name="fascia" type="text" value="<?php echo $riga["fascia"]?>" hidden>
                        <?php if ($num <= $disponibilita){
                            echo "Stanza: <input class='inputBottom' name='stanzanew' type='text' value='''><br><br>";
                        } else {
                            echo "Disponibilita esaurita";
                        }
                        ?>
                        <input class="inputBottom" name="disponibilita" type="text" value="<?php echo $riga["disponibilita"]?>" hidden>
                        <input class="inputBottom" name="id" type="text" value="<?php echo $riga["id"]?>" hidden>
                        <p>
                            Numeri tavoli occupati <?php echo $num - 1?> su <?php echo $riga["postiSala"]?>
                        </p>
                        <button type="submit" class="click" value="Invia" name="Invio"><i class="fa fa-check"></i></button>
                        <button type="reset" class="click">
                            <a href="index.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
                        </button>
                        <button onclick ="creaPdf()" type = "button">Crea PDF</button>
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
