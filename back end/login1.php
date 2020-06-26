<?php
session_start();
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');

$_SESSION["codiceStruttura"]=$_POST["codiceStruttura"];
$query = mysqli_query( $conn, "SELECT * FROM codici WHERE codiceStruttura='".$_POST["codiceStruttura"]."'")
or DIE('query non riuscita'.mysqli_error());
if(mysqli_num_rows($query)>0)
{
    $row = mysqli_fetch_assoc($query);
    $_SESSION["logged"] =true;
        header("location:prenotazione_sala.php");
        echo $riga["codiceStruttura"];
}else{
    ?>
    <form action="login1.php" method="POST">
        Codice struttura: <input name="codiceStruttura" type="text"/></span>
        <input type="submit" title="login" value="Login" name="Login"/>
    </form>
    <?php
    echo "Codice errato";
}
?>