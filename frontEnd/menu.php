<?php
session_start();
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');
include('header.html');
?>
<div id="main">
    <h1>Menu</h1>
    <?php include ('menu.html'); ?>
    <input class="form-control" id="myInput" type="text" placeholder="Cerca..">
    <table id="myTable">
        <thead>
            <tr>
                <th data-field="name" data-filter-control="input">
                    Categoria
                </th>
                <td>
                    Immagine
                </td>
                <td data-field="prodotto" data-filter-control="input">
                    Prodotto
                </td>
                <td data-field="allergeni" data-filter-control="input">
                    Allergeni
                </td>
                <td data-field="prezzo" data-filter-control="input">
                    Prezzo
                </td>
            </tr>
        </thead>
        <tbody>
        <?php
            $strsql = "select distinct * from menu where codiceStruttura= '$codiceStruttura' order by categoria";
            $risultato = mysqli_query($conn, $strsql);
            if (! $risultato)
            {
            echo "Errore nel comando SQL" . "<br>";
            }
            $riga = mysqli_fetch_array($risultato);
            if (! $riga)
            {
                echo '<tr>Nessun valore inserito</tr>';
            }
            else {
                while ($riga) {
                    echo "<tr>";
                    echo "<input class='inputTable' name='id' value='" . $riga['id'] . "' hidden/>";
                    echo "<td>". $riga['categoria'] ."</td>";
                    echo "<td><img src='".$riga["immagine"]."' alt='".$riga["immagine"]."'></td>";
                    echo "<td>" . $riga['prodotto'] . "</td>";
                    echo "<td>" . $riga['allergeni'] . "</td>";
                    echo "<td>" . number_format($riga['prezzo'], 2) . " &euro;</td>";
                    echo "</tr>";
                    $riga = mysqli_fetch_array($risultato);
                }
            }
                ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

