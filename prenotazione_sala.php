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
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
            $( "#datepickerA" ).datepicker();
        });
    </script>
</head>
<body>
    <h1>Prenotazione Sala</h1>
    <div>
        <fieldset>
                <legend>Selezionare periodo</legend>
                <span>Da</span><input type="date" id="datepicker" value="" format="dd-mm-yyyy">
                <span>A</span><input type="date" id="datepickerA" format="dd-mm-yyyy">
                &emsp;
                <button onclick="document.getElementById('compilaPeriodo').style.display='block'">Compila</button>
            </fieldset>
        <div id="compilaPeriodo" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('compilaPeriodo').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h1>Inserisci orario della settimana dal  al </h1>
                    <form action="prenotazione_sala.php" method="POST">
                        <table>
                            <thead>
                            <tr>
                                <td>
                                    Giorno
                                </td>
                                <td>
                                    Ora di Inizio
                                </td>
                                <td>
                                    Ora di Fine
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input class="inputBottom" name="giorno" type="text" value="Lunedi">
                                </td>
                                <td>
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
                                    </select>
                                </td>
                                <td>
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
                                    </select>
                                </td>
                            <tr>
                                <td>
                                    <input class="inputBottom" name="giorno1" type="text" value="Martedi">
                                </td>
                                <td>
                                    <select name="oraInizio1">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="oraFine1">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="inputBottom" name="giorno2" type="text" value="Mercoledi">
                                </td>
                                <td>
                                    <select name="oraInizio2">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="oraFine2">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="inputBottom" name="giorno3" type="text" value="Giovedi">
                                </td>
                                <td>
                                    <select name="oraInizio3">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="oraFine3">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="inputBottom" name="giorno4" type="text" value="Venerdi">
                                </td>
                                <td>
                                    <select name="oraInizio4">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="oraFine4">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="inputBottom" name="giorno5" type="text" value="Sabato">
                                </td>
                                <td>
                                    <select name="oraInizio5">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="oraFine5">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="inputBottom" name="giorno6" type="text" value="Domenica">
                                </td>
                                <td>
                                    <select name="oraInizio6">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="oraFine6">
                                        <option value="7:00">7:00</option>
                                        <option value="7:30">7:30</option>
                                        <option value="8:00">8:00</option>
                                    </select>
                                </td>
                            </tr>
                            </tr>
                            </tbody>
                        </table>
                        <span class="modale">
                        <input type="submit" value="Salva">&emsp;
                        <input type="button" value="Annulla" onclick="document.getElementById('compilaPeriodo').style.display='none'">
                    </span>
                    </form>
                </div>
            </div>
        </div>
        <?php
        $giorno = $_POST["giorno"];
        $oraInizio = $_POST["oraInizio"];
        $oraFine = $_POST["oraFine"];
        $giorno1 = $_POST["giorno1"];
        $oraInizio1 = $_POST["oraInizio1"];
        $oraFine1 = $_POST["oraFine1"];
        $giorno2 = $_POST["giorno2"];
        $oraInizio2 = $_POST["oraInizio2"];
        $oraFine2 = $_POST["oraFine2"];
        $giorno3 = $_POST["giorno3"];
        $oraInizio3 = $_POST["oraInizio3"];
        $oraFine3 = $_POST["oraFine3"];
        $giorno4 = $_POST["giorno4"];
        $oraInizio4 = $_POST["oraInizio4"];
        $oraFine4 = $_POST["oraFine4"];
        $giorno5 = $_POST["giorno5"];
        $oraInizio5 = $_POST["oraInizio5"];
        $oraFine5 = $_POST["oraFine5"];
        $giorno6 = $_POST["giorno6"];
        $oraInizio6 = $_POST["oraInizio6"];
        $oraFine6 = $_POST["oraFine6"];
        $strsql = "insert into orari (giorno,oraInizio, oraFine) values ('$giorno', '$oraInizio', '$oraFine')";
        $risultato = mysqli_multi_query ($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        else
        {
        $strsql = "select * from orari where giorno!= '' ";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "<div class='tabella'>Nessun orario inserito a database" . "<br>";
        }
        else
        {
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Giorno</th>
                        <th>Ora Inizio</th>
                        <th>Ora Fine</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($riga)
                {
                    echo ("<tr>");
                    echo "<td>".$riga["giorno"]."</td>";
                    echo "<td>".$riga["oraInizio"]."</td>";
                    echo "<td>".$riga["oraFine"]."</td>";
                    echo ("</tr>");
                    $riga = mysqli_fetch_array($risultato);
                }
                ?>
                </tbody>
            </table>
        <?php }
        }
        ?>
        <p id="prenotazionePeriodo"></p>
        <div>
            <form name='moduloCalcolaTurni'>
                <span>Numero tavoli in sala</span>&nbsp;<input class="inputBottom" type=”number” name='postiSala'>&emsp;
                <span>Durata turno</span>&nbsp;<select id="durataTurno"></select>
                <button type="button" class="click" onclick="calcola()">Calcola</button>
                <button type="button" class="click" onclick="refresh()">Annulla</button>
            </form>
        </div>
        <p id="inserimento"></p>
    </div>
</body>
</html>
<script>
    const elementsturni = document.querySelector("#durataTurno");
    const turniArray = [...elementsturni];

    // Now you can use cool array prototypes
    turniArray.forEach(element => {
        console.log(element);
    });

    var array_turno= ['0:15','0:30','0:45','1:00','1:15','1:30'
    ];
    turni = document.getElementById('durataTurno');
    for( turno in array_turno ) {
        turni.add( new Option( array_turno[turno] ));
    };
</script>