<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');

?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Vetrineonline</title>
        <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
        <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/prenotazione.js"></script>
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    </head>
    <body>
    <h1>Prenotazione Sala</h1>
    <div id="menu">
        <h1>Impostazioni</h1>
        <form name="gestioneOrari" action="prenotazione_sala1.php" method="post" class="setting">
            <fieldset>
                <legend>Selezionare periodo</legend>
                <span>Da</span><input type="date" id="datepicker" name="dataInizio" value="" format="dd-mm-yyyy"><br>
                <span>A</span><input type="date" id="datepickerA" name="dataFine" format="dd-mm-yyyy"><br>
                <span>Fascia</span>
                <select name="identificatore">
                    <option value="Colazione">Colazione</option>
                    <option value="Pranzo">Pranzo</option>
                    <option value="Cena">Cena</option>
                </select><br>
                <span>Ora Inizio</span>
                <select name="oraInizio">
                    <option value="5:00">5:00</option>
                    <option value="5:30">5:30</option>
                    <option value="6:00">6:00</option>
                    <option value="6:00">6:30</option>
                    <option value="7:00">7:00</option>
                    <option value="7:30">7:30</option>
                    <option value="8:00">8:00</option>
                    <option value="8:30">8:30</option>
                    <option value="9:00">9:00</option>
                    <option value="9:30">9:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:15">11:15</option>
                    <option value="11:30">11:30</option>
                    <option value="11:45">11:45</option>
                    <option value="12:00">12:00</option>
                    <option value="12:15">12:15</option>
                    <option value="12:30">12:30</option>
                    <option value="12:45">12:45</option>
                    <option value="13:00">13:00</option>
                    <option value="13:15">13:15</option>
                    <option value="13:30">13:30</option>
                    <option value="13:45">13:45</option>
                    <option value="14:00">14:00</option>
                    <option value="14:15">14:15</option>
                    <option value="14:30">14:30</option>
                    <option value="14:45">14:45</option>
                    <option value="15:00">15:00</option>
                    <option value="15:15">15:15</option>
                    <option value="15:30">15:30</option>
                    <option value="15:45">15:45</option>
                    <option value="16:00">16:00</option>
                    <option value="16:15">16:15</option>
                    <option value="16:30">16:30</option>
                    <option value="16:45">16:45</option>
                    <option value="17:00">17:00</option>
                    <option value="17:15">17:15</option>
                    <option value="17:30">17:30</option>
                    <option value="17:45">17:45</option>
                    <option value="18:00">18:00</option>
                    <option value="18:15">18:15</option>
                    <option value="18:30">18:30</option>
                    <option value="18:45">18:45</option>
                    <option value="19:00">19:00</option>
                    <option value="19:15">19:15</option>
                    <option value="19:30">19:30</option>
                    <option value="19:45">19:45</option>
                    <option value="20:00">20:00</option>
                    <option value="20:15">20:15</option>
                    <option value="20:30">20:30</option>
                    <option value="20:45">20:45</option>
                    <option value="21:00">21:00</option>
                    <option value="21:15">21:15</option>
                    <option value="21:30">21:30</option>
                    <option value="21:45">21:45</option>
                    <option value="22:00">22:00</option>
                    <option value="22:15">22:15</option>
                    <option value="22:30">22:30</option>
                    <option value="22:45">22:45</option>
                    <option value="23:00">23:00</option>
                    <option value="23:15">23:15</option>
                    <option value="23:30">23:30</option>
                </select><br>
                <span>Ora Fine</span>
                <select name="oraFine">
                    <option value="5:00">5:00</option>
                    <option value="5:30">5:30</option>
                    <option value="6:00">6:00</option>
                    <option value="6:00">6:30</option>
                    <option value="7:00">7:00</option>
                    <option value="7:30">7:30</option>
                    <option value="8:00">8:00</option>
                    <option value="8:30">8:30</option>
                    <option value="9:00">9:00</option>
                    <option value="9:30">9:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:15">11:15</option>
                    <option value="11:30">11:30</option>
                    <option value="11:45">11:45</option>
                    <option value="12:00">12:00</option>
                    <option value="12:15">12:15</option>
                    <option value="12:30">12:30</option>
                    <option value="12:45">12:45</option>
                    <option value="13:00">13:00</option>
                    <option value="13:15">13:15</option>
                    <option value="13:30">13:30</option>
                    <option value="13:45">13:45</option>
                    <option value="14:00">14:00</option>
                    <option value="14:15">14:15</option>
                    <option value="14:30">14:30</option>
                    <option value="14:45">14:45</option>
                    <option value="15:00">15:00</option>
                    <option value="15:15">15:15</option>
                    <option value="15:30">15:30</option>
                    <option value="15:45">15:45</option>
                    <option value="16:00">16:00</option>
                    <option value="16:15">16:15</option>
                    <option value="16:30">16:30</option>
                    <option value="16:45">16:45</option>
                    <option value="17:00">17:00</option>
                    <option value="17:15">17:15</option>
                    <option value="17:30">17:30</option>
                    <option value="17:45">17:45</option>
                    <option value="18:00">18:00</option>
                    <option value="18:15">18:15</option>
                    <option value="18:30">18:30</option>
                    <option value="18:45">18:45</option>
                    <option value="19:00">19:00</option>
                    <option value="19:15">19:15</option>
                    <option value="19:30">19:30</option>
                    <option value="19:45">19:45</option>
                    <option value="20:00">20:00</option>
                    <option value="20:15">20:15</option>
                    <option value="20:30">20:30</option>
                    <option value="20:45">20:45</option>
                    <option value="21:00">21:00</option>
                    <option value="21:15">21:15</option>
                    <option value="21:30">21:30</option>
                    <option value="21:45">21:45</option>
                    <option value="22:00">22:00</option>
                    <option value="22:15">22:15</option>
                    <option value="22:30">22:30</option>
                    <option value="22:45">22:45</option>
                    <option value="23:00">23:00</option>
                    <option value="23:15">23:15</option>
                    <option value="23:30">23:30</option>
                </select>
                &emsp;<br><br>
                <button type="submit" class="click" value="compila">Compila</button>
            </fieldset>
        </form>

        <form action="calcola.php" method="POST">
            <span>Numero tavoli in sala</span>&nbsp;<input class="inputBottom" type="text" name="postiSala" value="">&emsp;
            <span>Durata turno</span>&nbsp;
            <select name="durataTurno">
                <option value="0:15">0:15</option>
                <option value="0:30">0:30</option>
                <option value="0:45">0:45</option>
                <option value="1:00">1:00</option>
                <option value="1:15">1:15</option>
                <option value="1:30">1:30</option>
            </select><br><br>
            <button type="submit" class="click" value="calcola">Calcola</button>
        </form>
    </div>
    <div id="contenuto">
        <?php
            $giorno = $_POST["giorno"];
            $turno = $_POST["turno"];
            $stanza = $_POST["stanza"];
            $disponibilita= $_POST["disponibilita"];
            $postiSala = $_POST["disponibilita"];
            $num=count(explode(" ", $stanza));
            $disponibilita = ($postiSala - $num);
            $strsql = "update prenotazione set stanza='$stanza', disponibilita= '$disponibilita' where turno = substr('$turno', 9)";
            $risultato = mysqli_query($conn, $strsql);
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
            ?>
            <fieldset>
                <legend>Cerca</legend>
                <form action="ricercaOrari.php" method="post">
                    Data: <input type="date" class="inputBottom" name="dataInizio" value="" placeholder="gg/mm/aaaa">
                    Data: <input type="date" class="inputBottom" name="dataFine" value="" placeholder="gg/mm/aaaa">
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
        <table id="example" class="display">
            <thead>
            <tr>
                <td>Giorno</td>
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
                echo "<td><input class='inputTable' class='Bordernone' name='giorno' value='".date('d/m/Y', $riga['giorno'])."'/></td>";
                echo "<td>".$riga['identificazione']."</td>";
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
                            <td>Turno</td>
                            <td>Stanza</td>
                            <td>Inserisci</td>
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
                    <!--Etichetta: <select name="fascia">
                        <option value="colazione">Colazione</option>
                        <option value="pranzo">Pranzo</option>
                        <option value="cena">Cena</option>
                    </select>-->
                    &emsp;<button class="click" type="submit">Cerca</button>
                    <button class="click">
                        <a href="prenotazione_sala.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
                    </button>
                </form>
            </fieldset>
        <table>
            <thead>
            <tr>
                <td>Giorno</td>
                <td>Turno</td>
                <td>Stanza</td>
                <td>Inserisci</td>
            </tr>
            </thead>
            <tbody>
            <td colspan="4">
                <div class="divinterno">
                    <table class="table-int">
            <?php
            while ($riga)
            {
                echo ("<tr>");
                echo "<form action='modifica.php' method='POST'>";
                echo "<td>".date('d/m/Y',$riga["giorno"])."</td>";
                echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turnoInizio"]." - ".$riga["turno"]."'/></td>";
                echo "<td>".$riga["stanza"]."</td>";
                echo "<td> <button type='submit' class='click' value='inserisci'>Inserisci</button> </td>";
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
            <p></p><br>
        <?php }
            }
        ?>
    </body>
</html>
