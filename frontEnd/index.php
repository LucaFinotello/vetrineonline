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
<h1>Prenota il tuo turno</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cerca per giorno...">
<?php
    if($codiceStruttura=='H001'){
    $strsql = "select * from prenotazione where codiceStruttura= '$codiceStruttura'";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "La data non corrisponde";
    }
    else
    {
        ?>
        <table id="myTable">
            <tr class="header">
                <th>Giorno</th>
                <th>Fascia</th>
                <th>Turno</th>
                <th>Stanza</th>
                <th>Azioni</th>
            </tr>
            <?php
            while ($riga)
            {
                echo ("<tr>");
                echo "<form action='modifica.php' method='POST'>";
                echo  "<input type='text' name='id' value='".$riga["id"]."' hidden/>";
                echo "<td>".date('d/m/Y', $riga["giorno"])."</td>";
                echo "<td><input class='inputTable' type='text' name='fascia' readonly value='".$riga["fascia"]."'/></td>";
                echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turnoInizio"]." - ".$riga["turno"]."'/></td>";
                echo "<td>".$riga["stanza"]."</td>";
                echo "<td> <button type='submit' class='click'>Inserisci</button> </td>";
                echo "</form>";
                echo ("</tr>");
                $riga = mysqli_fetch_array($risultato);
            }
            ?>
            </tbody>
        </table>
    <?php }
} else {
        function percentuale($tot,$num){
            return round($num/$tot*100) . '%';
        }
        //$tot= count('$tot');
        $strsql = "select * from sala where codiceStruttura= '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "La data non corrisponde";
        }
        else
        {
            ?>
            <table id="myTable">
                <tr class="header">
                    <th>Giorno</th>
                    <th>Fascia</th>
                    <th>Turno</th>
                    <th>Azioni</th>
                </tr>
                <?php
                while ($riga)
                {
                    echo ("<tr>");
                    echo "<form action='modifica.php' method='POST'>";
                    echo  "<input type='text' name='id' value='".$riga["id"]."' hidden/>";
                    echo "<td><input class='inputTable' type='text' readonly value='".date('d/m/Y', $riga["giorno"])."'/></td>";
                    echo "<input class='inputTable' type='text' name='giorno' readonly value='".$riga["giorno"]."'hidden/>";
                    echo "<td><input class='inputTable' type='text' name='fascia' readonly value='".$riga["fascia"]."'/></td>";
                    echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turno"]."'/></td>";
                    //echo "<td>".percentuale($riga['postiTavolo'],$riga['numeroTavolo'])."</td>";
                    echo "<td> <button type='submit' class='click'>Prenota</button> </td>";
                    echo "</form>";
                    echo ("</tr>");
                    $riga = mysqli_fetch_array($risultato);
                }
                ?>
                </tbody>
            </table>
        <?php }
    }

?>
</body>
</html>