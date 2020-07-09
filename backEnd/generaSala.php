<?php
session_start();
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <div id="contenuto">
        <?php
        //print_r($_POST);
        $dataInizio = strtotime($_POST["dataInizio"]);
        $datafine = strtotime($_POST["dataFine"]);
        $postiTavolo= $_POST ['postiTavolo'];
        $numeroTavolo = $_POST['numeroTavolo'];
        $fascia = $_POST['fascia'];
        $turno = $_POST['turno'];
        $disponibilita = 1;

        $oggi= strtotime($_POST['dataInizio']);
        $dataTermine= strtotime($_POST['dataFine']);

        for ($i = $oggi; $i <= $dataTermine; $i=$i+86400) {
            $giorno=$i;
            $strsql = "insert into sala SET postiTavolo='$postiTavolo', numeroTavolo= '$numeroTavolo', giorno= '$giorno',
                disponibilita= '$disponibilita', fascia= '$fascia', turno='$turno', codiceStruttura= '$codiceStruttura'";
            $risultato = mysqli_query($conn, $strsql);
        }

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