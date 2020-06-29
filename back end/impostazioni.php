<?php
include('header.html');
?>
<h1>Impostazioni</h1>
<?php include ('menu.html'); ?>
<form name="gestioneOrari" action="creazioneTurni.php" method="post" class='setting'>
    <fieldset>
        <legend>Selezionare periodo</legend>
        <span>Da</span><input type="date" id="datepicker" name="dataInizio" value="" format="dd-mm-yyyy" required><br>
        <span>A</span><input type="date" id="datepickerA" name="dataFine" format="dd-mm-yyyy" required><br>
        <span>Fascia</span>
        <select name="identificatore">
            <option value="Colazione">Colazione</option>
            <option value="Pranzo">Pranzo</option>
            <option value="Cena">Cena</option>
        </select><br>
        <span>Ora Inizio</span>
        <select name="oraInizio">
            <option value="5:00">5:00</option>
            <option value="5:30">5:30</option>
            <option value="6:00">6:00</option>
            <option value="6:00">6:30</option>
            <option value="7:00">7:00</option>
            <option value="7:30">7:30</option>
            <option value="8:00">8:00</option>
            <option value="8:30">8:30</option>
            <option value="9:00">9:00</option>
            <option value="9:30">9:30</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:15">11:15</option>
            <option value="11:30">11:30</option>
            <option value="11:45">11:45</option>
            <option value="12:00">12:00</option>
            <option value="12:15">12:15</option>
            <option value="12:30">12:30</option>
            <option value="12:45">12:45</option>
            <option value="13:00">13:00</option>
            <option value="13:15">13:15</option>
            <option value="13:30">13:30</option>
            <option value="13:45">13:45</option>
            <option value="14:00">14:00</option>
            <option value="14:15">14:15</option>
            <option value="14:30">14:30</option>
            <option value="14:45">14:45</option>
            <option value="15:00">15:00</option>
            <option value="15:15">15:15</option>
            <option value="15:30">15:30</option>
            <option value="15:45">15:45</option>
            <option value="16:00">16:00</option>
            <option value="16:15">16:15</option>
            <option value="16:30">16:30</option>
            <option value="16:45">16:45</option>
            <option value="17:00">17:00</option>
            <option value="17:15">17:15</option>
            <option value="17:30">17:30</option>
            <option value="17:45">17:45</option>
            <option value="18:00">18:00</option>
            <option value="18:15">18:15</option>
            <option value="18:30">18:30</option>
            <option value="18:45">18:45</option>
            <option value="19:00">19:00</option>
            <option value="19:15">19:15</option>
            <option value="19:30">19:30</option>
            <option value="19:45">19:45</option>
            <option value="20:00">20:00</option>
            <option value="20:15">20:15</option>
            <option value="20:30">20:30</option>
            <option value="20:45">20:45</option>
            <option value="21:00">21:00</option>
            <option value="21:15">21:15</option>
            <option value="21:30">21:30</option>
            <option value="21:45">21:45</option>
            <option value="22:00">22:00</option>
            <option value="22:15">22:15</option>
            <option value="22:30">22:30</option>
            <option value="22:45">22:45</option>
            <option value="23:00">23:00</option>
            <option value="23:15">23:15</option>
            <option value="23:30">23:30</option>
            <option value="23:45">23:45</option>
        </select><br>
        <span>Ora Fine</span>
        <select name="oraFine">
            <option value="5:00">5:00</option>
            <option value="5:30">5:30</option>
            <option value="6:00">6:00</option>
            <option value="6:00">6:30</option>
            <option value="7:00">7:00</option>
            <option value="7:30">7:30</option>
            <option value="8:00">8:00</option>
            <option value="8:30">8:30</option>
            <option value="9:00">9:00</option>
            <option value="9:30">9:30</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:15">11:15</option>
            <option value="11:30">11:30</option>
            <option value="11:45">11:45</option>
            <option value="12:00">12:00</option>
            <option value="12:15">12:15</option>
            <option value="12:30">12:30</option>
            <option value="12:45">12:45</option>
            <option value="13:00">13:00</option>
            <option value="13:15">13:15</option>
            <option value="13:30">13:30</option>
            <option value="13:45">13:45</option>
            <option value="14:00">14:00</option>
            <option value="14:15">14:15</option>
            <option value="14:30">14:30</option>
            <option value="14:45">14:45</option>
            <option value="15:00">15:00</option>
            <option value="15:15">15:15</option>
            <option value="15:30">15:30</option>
            <option value="15:45">15:45</option>
            <option value="16:00">16:00</option>
            <option value="16:15">16:15</option>
            <option value="16:30">16:30</option>
            <option value="16:45">16:45</option>
            <option value="17:00">17:00</option>
            <option value="17:15">17:15</option>
            <option value="17:30">17:30</option>
            <option value="17:45">17:45</option>
            <option value="18:00">18:00</option>
            <option value="18:15">18:15</option>
            <option value="18:30">18:30</option>
            <option value="18:45">18:45</option>
            <option value="19:00">19:00</option>
            <option value="19:15">19:15</option>
            <option value="19:30">19:30</option>
            <option value="19:45">19:45</option>
            <option value="20:00">20:00</option>
            <option value="20:15">20:15</option>
            <option value="20:30">20:30</option>
            <option value="20:45">20:45</option>
            <option value="21:00">21:00</option>
            <option value="21:15">21:15</option>
            <option value="21:30">21:30</option>
            <option value="21:45">21:45</option>
            <option value="22:00">22:00</option>
            <option value="22:15">22:15</option>
            <option value="22:30">22:30</option>
            <option value="22:45">22:45</option>
            <option value="23:00">23:00</option>
            <option value="23:15">23:15</option>
            <option value="23:30">23:30</option>
            <option value="23:45">23:45</option>
        </select>
        &emsp;<br><br>
        <span>Numero tavoli in sala</span>&nbsp;
        <input class="inputBottom inputNumber" type="number" name="postiSala" value="" step="any" required>&emsp;
        <span>Durata turno</span>&nbsp;
        <select name="durataTurno" required>
            <option value="0:15">0:15</option>
            <option value="0:30">0:30</option>
            <option value="0:45">0:45</option>
            <option value="1:00">1:00</option>
            <option value="1:15">1:15</option>
            <option value="1:30">1:30</option>
        </select> &emsp;
        <button type="submit" class="click" value="compila">Compila</button>
    </fieldset>
</form>
<?php
    include ('footer.html');
?>
