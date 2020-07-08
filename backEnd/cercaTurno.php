<p></p><br>
<fieldset>
    <legend>Cerca turno</legend>
    <form action="ricercaTurno.php" method="post">
        Giorno: <input type="date" class="inputBottom" name="data" value="" placeholder="gg/mm/aaaa">
        <?php include ('fascie.php');?>
        &emsp;<button class="click" type="submit">Cerca</button>
    </form>
</fieldset>