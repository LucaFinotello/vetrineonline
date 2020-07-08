<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vetrineonline</title>
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/prenotazione.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>
<body>
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
    <h1>Vetrine Online</h1>
    <div style="text-align: center">
        <p>Inserire codice struttura per accedere al portale di prenotazione tavoli</p>
        <br>
        <form action="login1.php" method="POST">
            Codice struttura: <input name="codiceStruttura" type="text"/></span>
            <button type="submit" title="login" value="Login" name="Login" class="click">Entra</button>
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
