<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <h1>Inserisci Prenotazione</h1>
    <?php
        $id = $_POST["id"];
        $turno = $_POST["turno"];
        $strsql = "select * from prenotazione where codiceStruttura='$codiceStruttura' and id = '$id'";
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
            Data: <input class="inputBottom" name="giorno" type="text" value="<?php echo date('d/m/Y',$riga["giorno"])?>"><br>
            Turno: <input class="inputBottom" name="turno" type="text" readonly value="<?php echo $riga["turnoInizio"]?> - <?php echo $riga["turno"]?>"><br>
            Stanza: <input class="inputBottom" name="stanza" type="text" value="<?php echo $riga["stanza"]?>"><br><br>
            <input class="inputBottom" name="disponibilita" type="text" value="<?php echo $riga["disponibilita"]?>" hidden>
            <input class="inputBottom" name="id" type="text" value="<?php echo $riga["id"]?>" hidden>
            <p>
                Numeri tavoli disponibili <?php echo $riga["disponibilita"]?> su <?php echo $riga["postiSala"]?>
            </p>
            <button type="submit" class="click" value="Invia" name="Invio">Prenota</button>
            <button type="reset" class="click">
                <a href="index.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
            </button>
        </div>
    </form>
    <?php
					}
			?>
    </body>
</html>