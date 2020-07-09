<?php
session_start();
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <div id="contenuto">
        <?php
        $giorno = strtotime($_POST ['giorno']);
        $postiTavolo= $_POST ['postiTavolo'];
        $numeroTavolo = $_POST['numeroTavolo'];
        $fascia = $_POST['fascia'];
        $turno = $_POST['turno'];
        $disponibilita = 1;

        $strsql = "insert into sala SET postiTavolo='$postiTavolo', numeroTavolo= '$numeroTavolo', giorno= '$giorno',
                disponibilita= '$disponibilita', fascia= '$fascia', turno='$turno', codiceStruttura= '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);


        if (!$risultato)
        {
            include ('impostazioni.php');
            echo "Errore nel comando SQL" . "<br>";
        }
        else
        {
            include ('impostazioni.php');
            echo "Tavolo creato" . "<br>";
        }
        ?>
    </div>
<?php
include ('footer.html');
?>