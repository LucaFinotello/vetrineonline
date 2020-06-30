<table>
    <thead>
    <tr>
        <td>Giorno</td>
        <td>Fascia</td>
        <td>Turno</td>
        <td>Stanza</td>
        <td>Azioni</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="5">
            <div class="divinterno">
                <table class="table-int">
                    <?php
                    while ($riga)
                    {
                        echo ("<tr>");
                        echo "<form action='modifica.php' method='POST'>";
                        echo "<input class='inputTable' name='id' value='".$riga['id']."' hidden/>";
                        echo "<td >".date('d/m/Y', $riga["giorno"])."</td>";
                        echo "<td>".$riga['fascia']."</td>";
                        echo "<td>".$riga["turnoInizio"]." - ".$riga["turno"]."</td>";
                        echo "<td><input class='inputPrenotazione' name='stanza' value='".$riga["stanza"]."'/></td>";
                        echo "<td> <button type='submit' class='click'>Inserisci</button> ";
                        echo "</form>";
                        echo "<form action='eliminaTurno.php' method='post' class='elimina'>
                               <input class='inputTable' name='id' value='".$riga['id']."' hidden/>
                               <input class='inputTable' name='stanza' value='".$riga['stanza']."' hidden/>
                                <button type='submit' class='click'>Elimina</button>
                                </form></td>";
                        echo ("</tr>");
                        $riga = mysqli_fetch_array($risultato);
                    }
                    ?>
                </table>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<p></p><br>
