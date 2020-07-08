<?php
setlocale(LC_TIME, 'italian'); // it_IT
$conn= mysqli_connect("localhost", "root", "", "vetrineonline");
include_once('mysql-fix.php');

    $strsql = "select * from durataTurno";
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
