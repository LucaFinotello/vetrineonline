<?php
if(!isset($_SESSION))
{
    session_start();
}
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <div id="contenuto">
        <?php
        $postiSala= $_POST ['postiSala'];

        $strsql = "select * from postiSala where codiceStruttura = '$codiceStruttura'";
        $risultato = mysqli_query($conn, $strsql);
        if (! $risultato)
        {
            echo "Errore nel comando SQL" . "<br>";
        }
        $riga = mysqli_fetch_array($risultato);
        if (! $riga) {

            $strsql = "insert into postiSala SET postiSala='$postiSala', codiceStruttura= '$codiceStruttura'";
            $risultato = mysqli_query($conn, $strsql);

            if (!$risultato) {
                include('impostazioni.php');
                echo "Errore nel comando SQL" . "<br>";
            } else {
                header('location:impostazioni.php');
            }
        } else {
            $strsql = "update postiSala SET postiSala='$postiSala', codiceStruttura= '$codiceStruttura'";
            $risultato = mysqli_query($conn, $strsql);

            if (!$risultato) {
                include('impostazioni.php');
                echo "Errore nel comando SQL" . "<br>";
            } else {
                header('location:impostazioni.php');
            }
        }
        ?>
    </div>
<?php
include ('footer.html');
?><?php
