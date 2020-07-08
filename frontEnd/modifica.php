<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <h1>Inserisci Prenotazione</h1>
    <?php
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
            Turno: <input class="inputBottom" name="turno" type="text" readonly value="<?php echo $riga["turnoInizio"]?> - <?php echo $riga["turno"]?>"><br>
            Stanza: <input class="inputBottom" name="stanza" type="text" value="<?php echo substr($riga["stanza"], 2)?>"><br><br>
            <input class="inputBottom" name="disponibilita" type="text" value="<?php echo $riga["disponibilita"]?>" hidden>
            <input class="inputBottom" name="id" type="text" value="<?php echo $riga["id"]?>">
            <p>
                Numeri tavoli disponibili <?php echo $riga["disponibilita"]?> su <?php echo $riga["postiSala"]?>
            </p>
            <button type="submit" class="click" value="Invia" name="Invio">Prenota</button>
            <button type="reset" class="click">
                <a href="index.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
            </button>
        </div>
    </form>
        <?php
        $giorno = $riga["giorno"];
        echo("<table>");

        $query = "SELECT * FROM sala where giorno = '$giorno'";
        $numero_colonne = 1;
        $results = mysqli_query($conn, $query) or die (mysqli_error());
        if (mysqli_num_rows($results) != 0) {
            while ($row = mysqli_fetch_array($results)) {
                $posto = $row['id'];
                $numeroTavolo = $row['numeroTavolo'];
                $nome = $row['nome'];
                $posti = $row['postiTavolo'];
                $dispo = $row['disponibilita'];
                if ($numero_colonne <= 10) {
                    $numero_colonne++;
                    if ($dispo == 1) {
                        echo("<td class='postazioni_libere' >N Tavolo: $numeroTavolo <br> posti $posti 
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

        echo("</table>");

        echo "</div></div>";

					}
			?>
    </body>
</html>