<?php
if(!isset($_SESSION))
{
    session_start();
}
setlocale(LC_TIME, 'italian'); // it_IT
include("db_con.php");
include_once('mysql-fix.php');
include('header.html');
?>
<h1>Impostazioni</h1>
<div id="contenuto">
<?php include ('menu.html'); ?>
    <div class="layoutMiddle">
        <form name="gestioneOrari" action="creazioneTurni.php" method="post" class='setting'>
            <fieldset>
                <legend>Selezionare periodo</legend>
                <span>Da</span><input type="date" id="datepicker" name="dataInizio" value="" format="dd-mm-yyyy" required><br>
                <span>A</span><input type="date" id="datepickerA" name="dataFine" format="dd-mm-yyyy" required><br>
                <?php
                include ('fascie.php');
                echo "<br>";
                include ('orarioInizio.php');
                include ('orariofine.php');
                include ('postiSala.php');
                include ('durataTurno.php');
                ?>
                <button type="submit" class="click" value="compila">Compila</button>
            </fieldset>
        </form>
    </div>
    <div class="layoutMiddle" style="padding-top: 2%">
        <button class="accordion">Imposta Fasce</button>
        <div class="panel">
           Inserire Fasce<br>
            <form action="insertFascie.php" method="post">
                <span>Titolo: </span><input type="text" name="fascia" value=""/>
                <button type="submit" class="click">Inserisci</button>
            </form>
            <form action="svuotaFascie.php" method="post">
                <button type="submit" class="click">Svuota campo</button>
            </form>
            <br>
        </div>

        <button class="accordion">Tavoli Sala</button>
        <div class="panel">
            Inserire Tavoli<br>
            <form action="insertTavoli.php" method="post">
                <span>Tavoli</span>&nbsp;
                <input class="inputBottom inputNumber" type="number" name="postiSala" value="" min=0 max=100 step="any" required>
                <button type="submit" class="click">Inserisci</button>
            </form>
            <form action="eliminaTavoli.php" method="post">
                <button type="submit" class="click">Svuota campo</button>
            </form>
        </div>

        <button class="accordion">Durata Turno</button>
        <div class="panel">
            Inserire durata turno<br>
            <form action="insertDurata.php" method="post">
                <span>Turno: </span><input type="text" name="turno" placeholder="00:00" value=""/>
                <button type="submit" class="click">Inserisci</button>
            </form>
            <form action="eliminaDurata.php" method="post">
                <button type="submit" class="click">Svuota campo</button>
            </form>
            <br>
        </div>
    </div>
    <div class="layoutFull">
        <h1>Disposizione sala</h1>
        <form action="generaSala.php" method="post">
            <span>Da</span><input type="date" id="datepicker" name="dataInizio" value="" format="dd-mm-yyyy" required>
            <span>A</span><input type="date" id="datepickerA" name="dataFine" format="dd-mm-yyyy" required>
            <span>Numero Posti tavolo</span>&emsp;<input class="inputBottom inputNumber" type="number" name="postiTavolo" min="1" max="30" value="" required/>
            <span>Numero Tavolo</span>&emsp;<input class="inputBottom inputNumber" type="number" name="numeroTavolo" min="1" max="30" value="" required/>
            <?php
                include ('fascie.php');
                include ('selectTurni.php');
            ?>
            <button type="submit" class="click">Aggiungi</button>
        </form>
    </div>

</div>
<?php
    include ('footer.html');
?>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
