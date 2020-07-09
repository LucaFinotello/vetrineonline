<?php
session_start();
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');?>
<div id="main">
        <h1>Prenotazione Sala</h1>
        <?php
            include ('menu.html');
            ?>
<div id='contenuto'>
    <details>
        <summary>
            Cerca giorno
        </summary>
        <p>
        <form action="cercaGiorno.php" method="post">
            <input type="date" id="datepickerA" name="giorno" value="<?php $_POST['giorno']?>" placeholder="gg/mm/aaaa">
            <button type="submit" class="click">Cerca</button>
        </form>
        </p>
    </details>
<?php
$giorno = date('m/d/Y');
$giorno = strtotime($giorno);
echo  "<h1>".date('d/m/Y', $giorno). "</h1>";
echo("<table>");



$query = "SELECT * FROM sala where giorno = '$giorno' and codiceStruttura = '$codiceStruttura'";
$numero_colonne = 1;
$results = mysqli_query($conn, $query) or die (mysqli_error());
if (mysqli_num_rows($results) != 0) {
    while ($row = mysqli_fetch_array($results)) {
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
                echo("<td class='postazioni_libere' >N Tavolo: $numeroTavolo <br> Posti: $posti Turno: $turno Fascia: $fascia
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
                                                <input type='checkbox' name='prenota' value='1' required/></input>
                                                <button type='submit'>Libera</button>
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
include ('footer.html');
?>