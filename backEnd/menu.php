<?php
session_start();
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');
include('header.html');
?>
<div id="main">
    <h1>Crea Menu</h1>
    <?php include ('menu.html'); ?>
    <table>
        <thead>
            <tr>
                <td>
                    Categoria
                </td>
                <td>
                    Immagine
                </td>
                <td>
                    Prodotto
                </td>
                <td>
                    Allergeni
                </td>
                <td>
                    Prezzo
                </td>
                <td>
                    Azioni
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="createMenu.php" method="POST" enctype="multipart/form-data">
                    <td>
                        <select name="categoria">
                            <option value="antipasti">Antipasti</option>
                            <option value="primi">Primi</option>
                            <option value="secondi">Secondi</option>
                            <option value="contorni">Contorni</option>
                            <option value="dolci">Dolci</option>
                            <option value="bevande">Bevande</option>
                        </select>
                    </td>
                    <td>
                        <input type="file" value="scegli immagine" name="image" />
                    </td>
                    <td>
                        <input type="text" name="prodotto" class="inputBottom"/>
                    </td>
                    <td>



                                <input type="checkbox" name="check_list[]" value="Pomodoro"><label>Pomodoro</label><br/>
                                <input type="checkbox" name="check_list[]" value="Mozzarella"><label>Mozzarella</label><br/>
                                <input type="checkbox" name="check_list[]" value="Cipolla"><label>Cipolle</label><br/>

                    </td>
                    <td>
                        <input type="number" step='any' min='0' max="400" name="prezzo" class="inputBottom"/>
                    </td>
                    <td>
                        <button type="submit" class="click"><i class="fa fa-check"></i></button>
                    </td>
                </form>
            </tr>


            <?php
            $strsql = "select * from menu where codiceStruttura= '$codiceStruttura' order by categoria";
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
                    echo "<form action='eliminaVoce.php' method='post'>";
                    echo "<input class='inputTable' name='id' value='" . $riga['id'] . "' hidden/>";
                    echo "<td><input class='inputTable' value='" . $riga['categoria'] . "'/></td>";
                    echo "<td><img src='".$riga["immagine"]."' alt='".$riga["immagine"]."'></td>";
                    echo "<td>" . $riga['prodotto'] . "</td>";
                    echo "<td>" . $riga['allergeni'] . "</td>";
                    echo "<td>" . number_format($riga['prezzo'], 2) . " &euro;</td>";
                    echo "<td>
                   <button type='submit' class='click'><i class='fa fa-trash'></i></button></form>
              </td>";
                    echo "</tr>";
                    $riga = mysqli_fetch_array($risultato);
                }
            }
                ?>
        </tbody>
    </table>

    <script>
        $(function() {

            $('#chkveg').multiselect({
                includeSelectAllOption: true
            });

            $('#btnget').click(function() {
                alert($('#chkveg').val());
            });
        });
    </script>
</div>
<?php
include ('footer.html');
?>
