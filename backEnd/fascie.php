<?php
session_start();
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');

    $strsql = "select * from fascia";
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
    <select name="fascia">
        <?php
        while ($riga)
        {
            echo "<option value='".$riga['descrizione']."'>".$riga['descrizione']."</option>";
            $riga = mysqli_fetch_array($risultato);
        }
        ?>
    </select><br>
<?php
    }
?>
