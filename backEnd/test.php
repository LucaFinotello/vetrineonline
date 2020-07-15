<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <h1>Prenotazione Sala</h1>
<div id="contenuto">
    <?php include ('menu.html');
            $id= $_POST['id'];
            $giorno = $_POST["giorno"];
            $turno = $_POST["turno"];
            $stanza = $_POST["stanza"];
            $disponibilita= $_POST["disponibilita"];
            $postiSala = $_POST["postiSala"];
            $num=count(explode(" ", $stanza));
            if($num<$postiSala){
                $disponibilita = ($postiSala + $num);
            }else{
                $disponibilita = ($postiSala - $num);
            }

            $strsql = "update prenotazione set stanza='$stanza', disponibilita= '$disponibilita' where id = '$id'";
                $risultato = mysqli_query($conn, $strsql);

            if (!$risultato)
              {
               echo "Errore nel comando SQL" . "<br>";
              } else {
                header('location:prenotazione_sala.php');
            }
include ('footer.html');?>