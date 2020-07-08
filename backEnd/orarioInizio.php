<?php
if(!isset($_SESSION))
{
    session_start();
}
include ('db_con.php');
include_once('mysql-fix.php');

    $strsql = "select * from time";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "<select>
                <option>Nessun valore</option>
              </select><br>";
    }
    else
    {
?>
    <span>Ora Inizio</span>
    <select name="oraInizio">
        <?php
        while ($riga)
        {
            echo "<option value='".$riga['ora']."'>".$riga['ora']."</option>";
            $riga = mysqli_fetch_array($risultato);
        }
        ?>
    </select><br>
<?php
    }
?>
