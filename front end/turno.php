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
<h1>Prenota il tuo turno</h1>
<div>
    <form action="turno.php" method="POST">
        <fieldset>
            <legend>Inserisci giorno</legend>
            Giorno: <input class="inputBottom" type="date" name="giorno" type="text" format="dd-mm-yyyy" value=""/>
            <button class="click" type="submit" name="invia" value="vai">Vai </button>
        </fieldset>
    </form>
    <?php
    $giorno= $_POST["giorno"];
    $strsql = "select * from prenotazione where giorno='$giorno'";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "la data non corrisponde";
    }
    else
    {
        while ($riga)
        {
            echo "<table><thead><tr><td>Giorno</td><td>Turno</td><td>Stanza</td><td>Inserisci</td></tr></thead><tbody>";
            echo "<tr>";
            echo "<form action='modifica.php' method='POST'>";
            echo "<td>".$riga["giorno"]."</td>";
            echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turno"]."'></input></td>";
            echo "<td>".$riga["stanza"]."</td>";
            echo "<td> <button type='submit' class='click'>Inserisci</button> </td>";
            echo "</form>";
            echo "</tr>";
            echo "</tbody></table>";
            $riga = mysqli_fetch_array($risultato);
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