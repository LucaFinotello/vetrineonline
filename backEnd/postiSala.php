<?php
if(!isset($_SESSION))
{
    session_start();
}
include ('db_con.php');
$codiceStruttura = $_SESSION["codiceStruttura"];
    $strsql = "select * from postiSala where codiceStruttura= '$codiceStruttura'";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "<span>Numero tavoli in sala</span>&nbsp;
                <input class='inputBottom inputNumber' name='postiSala' value='' placeholder='0' readonly>&emsp;";
    }
    else
    {
?>
        <span>Numero tavoli in sala</span>&nbsp;
        <?php
        while ($riga)
        {
            echo "<input class='inputBottom inputNumber' name='postiSala' value='".$riga['postiSala']."' readonly >&emsp;";
            $riga = mysqli_fetch_array($risultato);
        }
        ?>
    </select>
<?php
    }
?>
