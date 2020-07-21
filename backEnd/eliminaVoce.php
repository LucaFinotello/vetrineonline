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
        $id= $_POST['id'];
        $strsql = "delete from menu where id='$id'";
        $risultato = mysqli_query($conn, $strsql);

        if (!$risultato)
        {
            include ('menu.php');
            echo "Errore nel comando SQL" . "<br>";
        }
        else
        {
            header('location:menu.php');
        }
        ?>
    </div>
<?php
include ('footer.html');
?><?php
