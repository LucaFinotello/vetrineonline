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
        <?php
            $giorno = $_POST["giorno"];
            $turno = $_POST["turno"];
            $stanza = $_POST["stanza"];
            $strsql = "update prenotazione set stanza='$stanza' where turno = '$turno'";
            $risultato = mysqli_query($conn, $strsql);
            if (!$risultato)
              {
               echo "Errore nel comando SQL" . "<br>";
                  echo $giorno. "<br>" ;
                  echo $turno. "<br>";
                  echo $stanza. "<br>";
              } else {
                echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Cerca per giorno...'>";
        $strsql = "select * from prenotazione";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga)
        {
            echo "La data non corrisponde";
        }
        else
        {
            ?>
            <table id="myTable">
                <tr class="header">
                    <th>Giorno</th>
                    <th>Turno</th>
                    <th>Stanza</th>
                    <th>Modifica</th>
                </tr>
                <?php
                while ($riga)
                {
                    echo ("<tr>");
                    echo "<form action='modifica.php' method='POST'>";
                    echo "<td>".$riga["giorno"]."</td>";
                    echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turno"]."'></input></td>";
                    echo "<td>".$riga["stanza"]."</td>";
                    echo "<td> <button type='submit' class='click'>Inserisci</button> </td>";
                    echo "<form>";
                    echo "<tr>";
                    $riga = mysqli_fetch_array($risultato);
                }
                ?>
            </table>
        <?php }
            }
        ?>
    </body>
</html>