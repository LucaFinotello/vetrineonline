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
    <h1>Inserisci Prenotazione</h1>
    <?php
        $turno = $_POST["turno"];
        $strsql = "select * from prenotazione where turno = substr('$turno', 9)";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
          {
           echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
    echo "Turno assente" . "<br>";
    }
    else
    {
    ?>
    <form action="test.php" method="POST" >
        <div class="prenotazione">
            Data: <input class="inputBottom" name="giorno" type="text" readonly value="<?php echo $riga["giorno"]?>"><br>
            Turno: <input class="inputBottom" name="turno" type="text" readonly value="<?php echo $riga["turnoInizio"]?> - <?php echo $riga["turno"]?>"><br>
            Stanza: <input class="inputBottom" name="stanza" type="text" value="<?php echo $riga["stanza"]?>"><br><br>
            <p>
                Numeri tavoli disponibili <?php echo $riga["postiSala"]?>
            </p>
            <button type="submit" class="click" value="Invia" name="Invio">Prenota</button>
            <button type="reset" class="click">
                <a href="prenotazione_sala.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
            </button>
        </div>
    </form>
    <?php
					}
			?>
    </body>
</html>