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
echo "<div id='contenuto'>";
echo "<h1>".date("d/m/Y")."</h1>";
echo("<table>");

$giorno = '1593554400';

$query = "SELECT * FROM sala where giorno = '$giorno'";
$numero_colonne = 1;
$results = mysqli_query($conn, $query) or die (mysqli_error());
if (mysqli_num_rows($results) != 0) {
    while ($row = mysqli_fetch_array($results)) {
        $posto = $row['id'];
        $numeroTavolo = $row['numeroTavolo'];
        $posti = $row['postiTavolo'];
        $dispo = $row['disponibilita'];
        if ($numero_colonne <= 10) {
            $numero_colonne++;
            if ($dispo == 1) {
                echo("<td class='postazioni_libere' >N Tavolo: $numeroTavolo <br> posti $posti 
                                            <form action='prenotaTavolo.php' method='post'>
                                                <input name='id' value='$posto' hidden>
                                                <input type='checkbox' name='prenota' value='0' required/></input>
                                                <button type='submit'>Prenota</button>
                                            </form>
                                                </td>");
            } else {
                echo("<td class='postazioni_occupate' >N Tavolo: $numeroTavolo <br> posti $posti 
                                    <form action='prenotaTavolo.php' method='post'>
                                                <input name='id' value='$posto' hidden>
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