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
</head>
<body>
    <h1>Prenotazione Sala</h1>
    <div>
        <form name="gestioneOrari" action="gestione orari.php" method="post">
            <fieldset>
                <legend>Selezionare periodo</legend>
                <span>Da</span><input type="date" id="datepicker" name="dataInizio" value="" format="dd-mm-yyyy">
                <span>A</span><input type="date" id="datepickerA" name="dataFine" format="dd-mm-yyyy">
                &emsp;
                <button type="submit" class="click" value="compila">Compila</button>
            </fieldset>
        </form>
        <p></p>
        <?php
        $giorno = $_POST["giorno"];
        $oraInizio = $_POST["oraInizio"];
        $oraFine = $_POST["oraFine"];
        $strsql = "insert into orari (giorno, oraInizio, oraFine) values ('$giorno', '$oraInizio', '$oraFine')";
        $risultato = mysqli_query($conn, $strsql);
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
                        <td>Giorno</td>
                        <td>Ora Inizio</td>
                        <td>Ora Fine</td>
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
        <?php
        }
        ?>
        <p></p>
        <div>
            <form name='moduloCalcolaTurni' action="prenotazione_sala1.php" method="post">
                <span>Numero tavoli in sala</span>&nbsp;<input class="inputBottom" type=”number” name='postiSala'>&emsp;
                <span>Durata turno</span>&nbsp;<select id="durataTurno"></select>
                <button type="submit" class="click" value="calcola">Calcola</button>
                <button type="button" class="click" onclick="refresh()">Annulla</button>
            </form>
        </div>
        <?php
        $strsql = "select * from prenotazione ";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
        echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
        echo "";
            }
            else
            {
            ?>
            <table style="margin-top: 10px; margin-bottom:10px">
                <thead>
                <tr>
                    <td>Giorno</td>
                    <td>postisala</td>
                    <td>Turno</td>
                    <td>Stanza</td>
                    <td>Inserisci</td>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($riga)
                {
                    echo ("<tr>");
                    echo "<form action='modifica.php' method='POST'>";
                    echo "<td>".$riga["giorno"]."</td>";
                    echo "<td>".$riga["postiSala"]."</td>";
                    echo "<td><input style='text-align: center; border: none' type='text' name='turno' readonly value='".$riga["turno"]."'></input></td>";
                    echo "<td>".$riga["stanza"]."</td>";
                    echo "<td> <button type='submit' class='click' value='inserisci'>Inserisci</button> </td>";
                    echo "</form>";
                    echo ("</tr>");
                    $riga = mysqli_fetch_array($risultato);
                }
                ?>
                </tbody>
            </table>
            <?php }
        }
        ?>
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