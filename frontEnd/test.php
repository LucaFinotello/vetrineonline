<?php
if(!isset($_SESSION))
{
    session_start();
}
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
include ('menu.html');
?>
    <h1>Prenota il tuo turno</h1>
        <?php
        $id= $_POST['id'];
        $giorno = $_POST["giorno"];
        $turno = $_POST["turno"];
        $stanza = $_POST["stanza"];
        $stanzanew = $_POST["stanzanew"];
        $disponibilita= $_POST["disponibilita"];
        $postiSala = $_POST["disponibilita"];
        $disponibilita = ($postiSala - 1);
        $stanza= $stanza.' '. $stanzanew;
        $strsql = "update prenotazione set stanza='$stanza', disponibilita= '$disponibilita' where id = '$id'";
        $risultato = mysqli_query($conn, $strsql);
            if (!$risultato)
              {
               echo "Errore nel comando SQL" . "<br>";
                  echo $giorno. "<br>" ;
                  echo $turno. "<br>";
                  echo $stanza. "<br>";
              } else {
                echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Cerca per giorno...'>";
        $strsql = "select * from prenotazione where codiceStruttura = '$codiceStruttura' order by giorno";
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
            header('location:home');
             }
            }
        ?>
    </body>
</html>