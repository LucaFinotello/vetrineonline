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
    <div id="main">
    <h1>Prenotazione Sala</h1>
    <div id="contenuto">
        <?php
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $disponibilita = $_POST["prenota"];

            $strsql = "update sala set nome= '$nome', disponibilita='$disponibilita' where id = '$id'";
            $risultato = mysqli_query($conn, $strsql);
            if (!$risultato)
            {
                echo "Errore nel comando SQL" . "<br>";
            } else {
                header("location:index.php");
            }
        ?>
    </div>