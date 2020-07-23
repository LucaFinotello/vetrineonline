<?php
include ('header.html');
if(!isset($_SESSION))
{
    session_start();
}
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
    <h1>Vetrine Online</h1>
    <div style="text-align: center">
        <p>Inserire codice struttura per accedere al portale di prenotazione tavoli</p>
        <br>
        <form action="login1.php" method="POST">
            Codice struttura: <input name="codiceStruttura" type="text"/></span>
            <button type="submit" title="login" value="Login" name="Login" class="click"><i class="fa fa-sign-in"></i> </button>
        </form>
    </div>
    <?php
    echo "<div style='text-align: center; color: #ff0000' >Codice errato <br>";
    echo "codici validi: <br>
            H001<br>
            B001<br>
            R001<br></div>";
}
?>
</body>
</html>
