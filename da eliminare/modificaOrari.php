<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include('header.html')
?>
<body>
<h1>Modifica orario</h1>
<?php
$id = $_POST["id"];
$strsql = "select * from orari where id = '$id'";
$risultato = mysqli_query($conn, $strsql);
if (! $risultato)
{
    echo "Errore nel comando SQL" . "<br>";
}
$riga = mysqli_fetch_array($risultato);
if (! $riga)
{
    echo "Si è verificato un problema al caricamento dello slot. Riprovare piu tardi. :)" . "<br>";
}
else
{
    ?>
    <div class="prenotazione">
        <form action="modificaOra.php" method="POST" >
            <input class="inputBottom" name="id" type="text" value="<?php echo $riga["id"]?>" hidden/>
            Data: <input class="inputBottom" name="giorno" type="text" value="<?php echo date('d/m/Y', $riga["giorno"])?>"/><br>
            Fascia: <select name="identificatore">
                <option value="Colazione">Colazione</option>
                <option value="Pranzo">Pranzo</option>
                <option value="Cena">Cena</option>
            </select><br>
            OraInizio: <select name="oraInizio">
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
            </select><br>
            OraFine: <select name="oraFine">
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
            </select><br><br>
            <button type="submit" class="click" value="Invia" name="Invio"><i class="fa fa-pencil"></i></button>
        </form>
        <button onClick="javascript:window.location.href = 'prenotazione_sala.php'">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <?php
}
include('footer.html');
?>