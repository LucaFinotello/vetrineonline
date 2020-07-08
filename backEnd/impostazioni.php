<?php
include('header.html');
?>
<h1>Impostazioni</h1>
<div id="contenuto">
<?php include ('menu.html'); ?>
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
        ?>
        <span>Numero tavoli in sala</span>&nbsp;
        <input class="inputBottom inputNumber" type="number" name="postiSala" value="" min=0 max=100 step="any" required>&emsp;
        <?php
        include ('durataTurno.php');
        ?>
        <button type="submit" class="click" value="compila">Compila</button>
    </fieldset>
</form>
<h1>Disposizione sala</h1>
<form action="generaSala.php" method="post">
    <span>Giorno</span><input id="datepicker" type="date" name="giorno" format="dd-mm-yyyy" required>
    <span>Numero Posti tavolo</span>&emsp;<input class="inputBottom inputNumber" type="number" name="postiTavolo" min="1" max="30" value="" required/>
    <span>Numero Tavolo</span>&emsp;<input class="inputBottom inputNumber" type="number" name="numeroTavolo" min="1" max="30" value="" required/>
    <button type="submit" class="click">Aggiungi</button>
</form>
</div>
<?php
    include ('footer.html');
?>
