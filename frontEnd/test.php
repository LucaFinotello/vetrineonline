<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
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
        $num=count(explode(" ", $stanza));
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
            ?>
            <table id="myTable">
                <tr class="header">
                    <th>Giorno</th>
                    <th>Turno</th>
                    <th>Stanza</th>
                    <th>Azioni</th>
                </tr>
                <?php
                while ($riga)
                {
                    echo ("<tr>");
                    echo "<form action='modifica.php' method='POST'>";
                    echo  "<input type='text' name='id' value='".$riga["id"]."' hidden/>";
                    echo "<td>".date('d/m/Y', $riga["giorno"])."</td>";
                    echo "<td><input class='inputTable' type='text' name='turno' readonly value='".$riga["turno"]."'/></td>";
                    echo "<td>".$riga["stanza"]."</td>";
                    echo "<td> <button type='submit' class='click'><i class='fa fa-pencil'></i></button> </td>";
                    echo "<form>";
                    echo "<tr>";
                    $riga = mysqli_fetch_array($risultato);
                }
                ?>
            </table>
        <?php }
            }
        ?>
    </body>
</html>