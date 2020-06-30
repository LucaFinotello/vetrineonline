<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <h1>Prenotazione Sala</h1>
    <?php include ('menu.html');
            $id= $_POST['id'];
            $giorno = $_POST["giorno"];
            $turno = $_POST["turno"];
            $stanza = $_POST["stanza"];
            $disponibilita= $_POST["disponibilita"];
            $postiSala = $_POST["postiSala"];
            $num=count(explode(" ", $stanza));
            if($num<$postiSala){
                $disponibilita = ($postiSala - $num);
            }else{
                $disponibilita = ($postiSala + $num);
            }

            if ($postiSala<$disponibilita) {
                $strsql = "update prenotazione set stanza='$stanza', disponibilita= '$disponibilita' where id = '$id'";
                $risultato = mysqli_query($conn, $strsql);
            }else {
                echo ('Il numero dei tavoli occupati '.$num . 'Puoi inserire solo'.$postiSala. ' tavoli.' .
                    "<br><button><a style='text-decoration: none' href='prenotazione_sala.php'>Annulla</a></button>");
                exit;
            }

            if (!$risultato)
              {
               echo "Errore nel comando SQL" . "<br>";
                  echo $giorno. "<br>" ;
                  echo $turno. "<br>";
                  echo $stanza. "<br>";
              } else {
        $strsql = "select * from orari where giorno!= '' ";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "Nessun orario inserito a database";
        }
        else
        {
            include ('ricercaPeriodo.php');
            ?>
        <table>
            <thead>
            <tr>
                <td style="width: 300px">Giorno</td>
                <td>Fascia</td>
                <td>Ora Inizio</td>
                <td>Ora Fine</td>
                <td>Modifica</td>
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
                echo "<form action='modificaOrari.php' method='post'>";
                echo "<td style='width: 200px'><input class='inputTable' class='Bordernone' name='giorno' value='".date('d/m/Y', $riga['giorno'])."'/></td>";
                echo "<td>".$riga['fascia']."</td>";
                echo "<td>".$riga['oraInizio']."</td>";
                echo "<td>".$riga['oraFine']."</td>";
                echo "<td><button type='submit' class='click'>Modifica</button>";
                echo "</form>";
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
        <?php
        }
        $strsql = "select * from prenotazione ";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "<p></p><br>
                           <table id='turni' class='display'>
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
                        <td colspan='4'>Ops!!! Nessun dato inserito</td>
                        </tr>
                        </tbody>
                        </table>
                        <p></p><br>";
        }
        else
        {
        ?>
            <p></p><br>
            <fieldset>
                <legend>Cerca turno</legend>
                <form action="ricercaturno.php" method="post">
                    Giorno: <input type="date" class="inputBottom" name="data" value="" placeholder="gg/mm/aaaa">
                    Etichetta: <select name="fascia">
                        <option value="colazione">Colazione</option>
                        <option value="pranzo">Pranzo</option>
                        <option value="cena">Cena</option>
                    </select>
                    &emsp;<button class="click" type="submit">Cerca</button>
                    <button class="click">
                        <a href="prenotazione_sala.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
                    </button>
                </form>
            </fieldset>
        <?php
        include ('turni.php');
        }
            }
include ('footer.html');?>