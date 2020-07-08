<?php
if(!isset($_SESSION))
{
    session_start();
}
include ('db_con.php');
$codiceStruttura = $_SESSION["codiceStruttura"];
    $strsql = "select * from durataTurno where codiceStruttura= '$codiceStruttura'";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "<span>Durata turno</span>&nbsp;<select>
                <option>Nessun valore</option>
              </select><br>";
    }
    else
    {
?>
    <span>Durata turno</span>&nbsp;
    <select name="durataTurno">
        <?php
        while ($riga)
        {
            echo "<option value='".$riga['turno']."'>".$riga['turno']."</option>";
            $riga = mysqli_fetch_array($risultato);
        }
        ?>
    </select><br>
<?php
    }
?>
