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
    $giorno = $_POST['giorno'];
    $oraInizio = $_POST['oraInizio'];
    $oraFine = $_POST['oraFine'];
    //$giorno = array ($_POST["giorno"], $_POST["giorno1"], $_POST["giorno2"], $_POST["giorno3"], $_POST["giorno4"], $_POST["giorno5"], $_POST["giorno6"]);
    //$oraInizio = array($_POST["oraInizio"],$_POST["oraInizio1"],$_POST["oraInizio2"],$_POST["oraInizio3"],$_POST["oraInizio4"],$_POST["oraInizio5"],$_POST["oraInizio6"]);
    //$oraFine = array($_POST["oraFine"], $_POST["oraFine2"], $_POST["oraFine2"], $_POST["oraFine3"],$_POST["oraFine4"], $_POST["oraFine5"], $_POST["oraFine6"]);
    //array_push($giorno, '');
    //if (is_array($giorno)){
    // foreach ($giorno as $days) {
    //       $day = mysqli_real_escape_string($conn, $giorno[$days][1]);
    //        $query = "insert into orari(giorno)
    //        values ('$day')";
    //        $risultato= mysqli_query($conn, $query);
    //    }
    //}
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
            echo "Nessun orario inserito a database";
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
                    echo "<td>".$riga['giorno']."</td>";
                    echo "<td>".$riga['oraInizio']."</td>";
                    echo "<td>".$riga['oraFine']."</td>";
                    echo ("</tr>");
                    $riga = mysqli_fetch_array($risultato);
                }
                ?>
                </tbody>
            </table>
            <?php
        }
        ?>
        <form name="ricercaOrari" action="ricercaOrari.php" method="post">
            <fieldset>
                <legend>Selezione Date</legend>
                <span>Da</span><input type="date" id="datepicker" name="dataInizio" value="" format="dd-mm-yyyy">
                <span>A</span><input type="date" id="datepickerA" name="dataFine" format="dd-mm-yyyy">
                &emsp;
                <button type="submit" class="click" value="compila">Compila</button>
            </fieldset>
        </form>
        <p></p>
        <div>
            <form name='moduloCalcolaTurni' action="calcola.php" method="post">
                <span>Numero tavoli in sala</span>&nbsp;<input class="inputBottom" type=”number” name='postiSala'>&emsp;
                <span>Durata turno</span>&nbsp;
                <select name="durataTurno">
                    <option value="0:15">0:15</option>
                    <option value="0:30">0:30</option>
                    <option value="0:45">0:45</option>
                    <option value="1:00">1:00</option>
                    <option value="1:15">1:15</option>
                    <option value="1:30">1:30</option>
                </select>
                <button type="submit" class="click" value="calcola">Calcola</button>
                <button type="button" class="click" onclick="refresh()">Annulla</button>
            </form>
        </div>
        <?php
        $giorno = date('j-m-Y');
        $postiSala= $_POST['postiSala'];
        $durataTurno = $_POST['durataTurno'];
        $turno = $durataTurno;
        $strsql = "insert into prenotazione (giorno, turno, postiSala) value ('$giorno','$turno', '$postiSala')";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        else
        {
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