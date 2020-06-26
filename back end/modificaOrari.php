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
<h1>Modifica orario</h1>
<?php
$giorno = strtotime($_POST["giorno"]);
$strsql = "select * from orari where giorno = '$giorno'";
$risultato = mysqli_query($conn, $strsql);
if (! $risultato)
{
    echo "Errore nel comando SQL" . "<br>";
}
$riga = mysqli_fetch_array($risultato);
if (! $riga)
{
    echo "Si è verificato un problema al caricamento dello slot. Riprovare piu tardi. :)" . "<br>";
}
else
{
    ?>
    <form action="modificaOra.php" method="POST" >
        <div class="prenotazione">
            Data: <input class="inputBottom" name="giorno" type="text" value="<?php echo $riga["giorno"]?>"><br>
            Fascia: <select name="identificatore">
                <option value="Colazione">Colazione</option>
                <option value="Pranzo">Pranzo</option>
                <option value="Cena">Cena</option>
            </select><br>
            OraInizio: <input class="inputBottom" name="oraInizio" type="text" value="<?php echo $riga["oraInizio"]?>"><br>
            OraFine: <input class="inputBottom" name="oraFine" type="text" value="<?php echo $riga["oraFine"]?>"><br><br>
            <button type="submit" class="click" value="Invia" name="Invio">Modifica</button>
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