<?php
$conn= mysqli_connect("localhost", "root", "", "vetrineonline");
$codiceStruttura = $_SESSION["codiceStruttura"];
    $strsql = "select * from fascia where codiceStruttura= '$codiceStruttura'";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "<span>Etichetta: </span>
              <select>
                <option>Nessun valore</option>
              </select>";
    }
    else
    {
?>
    <span>Etichetta: </span>
    <select name="fascia">
        <?php
        while ($riga)
        {
            echo "<option value='".$riga['descrizione']."'>".$riga['descrizione']."</option>";
            $riga = mysqli_fetch_array($risultato);
        }
        ?>
    </select>
<?php
    }
?>
