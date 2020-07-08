<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html')
?>
    <div id="main">
    <h1>Prenotazione Sala</h1>
<?php
include ('menu.html')
?>
    <div id="contenuto">
        <fieldset>
            <legend>Cerca giorno</legend>
            <form action="cercaGiorno.php" method="post">
                <input type="date" name="giorno" value="<?php $_POST['giorno']?>" placeholder="gg/mm/aaaa">
                <button type="submit" class="click">Cerca</button>
            </form>
        </fieldset>
        <?php
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $disponibilita = $_POST["prenota"];

            $strsql = "update sala set nome= '$nome', disponibilita='$disponibilita' where id = '$id'";
            $risultato = mysqli_query($conn, $strsql);
            if (!$risultato)
            {
                echo "Errore nel comando SQL" . "<br>";
            } else {
                $giorno = date('m/d/Y');
                $giorno = strtotime($giorno);
                echo  "<h1>".date('d/m/Y', $giorno). "</h1>";
                echo("<table>");

                $query = "SELECT * FROM sala where giorno = $giorno ";
                $numero_colonne = 1;
                $results = mysqli_query($conn, $query) or die (mysqli_error());
                if (mysqli_num_rows($results) != 0) {
                    while ($row = mysqli_fetch_array($results)) {
                        $posto = $row['id'];
                        $nome = $row['nome'];
                        $numeroTavolo = $row['numeroTavolo'];
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
            }
        ?>
    </div>
<?php
include ('footer.html');
?>