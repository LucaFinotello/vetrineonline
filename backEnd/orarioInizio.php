<?php
setlocale(LC_TIME, 'italian'); // it_IT
$conn= mysqli_connect("localhost", "root", "", "vetrineonline");
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
