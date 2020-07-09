<?php
if(!isset($_SESSION))
{
    session_start();
}
include ('db_con.php');
$codiceStruttura = $_SESSION["codiceStruttura"];
    $strsql = "select distinct turnoInizio, turno from prenotazione where codiceStruttura= '$codiceStruttura'";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "<span>Turno: </span>
              <select>
                <option>Nessun valore</option>
              </select>";
    }
    else
    {
?>
    <span>Turno: </span>
    <select name="turno">
        <?php
        while ($riga)
        {
            echo "<option value='".$riga["turnoInizio"]." - ".$riga["turno"]."'>".$riga["turnoInizio"]." - ".$riga["turno"]."</option>";
            $riga = mysqli_fetch_array($risultato);
        }
        ?>
    </select>
<?php
    }
?>
