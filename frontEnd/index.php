<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
<h1>Prenota il tuo turno</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cerca per giorno...">
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
    echo "La data non corrisponde";
}
else
{
?>
<table id="myTable">
    <tr class="header">
        <th>Giorno</th>
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
            echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turnoInizio"]." - ".$riga["turno"]."'/></td>";
            echo "<td>".$riga["stanza"]."</td>";
            echo "<td> <button type='submit' class='click'><i class='fa fa-pencil'></i></button> </td>";
            echo "</form>";
            echo ("</tr>");
            $riga = mysqli_fetch_array($risultato);
        }
        ?>
        </tbody>
    </table>
        <?php }
        ?>

</body>
</html>