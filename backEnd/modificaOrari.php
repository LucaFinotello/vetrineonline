<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html')
?>
<body>
<h1>Modifica orario</h1>
<?php
$id = $_POST["id"];
$strsql = "select * from orari where id = '$id'";
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
            <input class="inputBottom" name="id" type="text" value="<?php echo $riga["id"]?>" hidden/>
            Data: <input class="inputBottom" name="giorno" type="text" value="<?php echo date('d/m/Y', $riga["giorno"])?>"/><br>
            <?php
                include ('fascie.php');
                echo "<br>";
                include ('orarioInizio.php');
                include ('orariofine.php');
            ?>
            <button type="submit" class="click" value="Invia" name="Invio">Modifica</button>
            <button type="reset" class="click">
                <a href="prenotazione_sala.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
            </button>
        </div>
    </form>
    <?php
}
include ('footer.html');
?>