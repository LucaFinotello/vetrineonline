<br>
<fieldset>
    <legend>Cerca periodo</legend>
    <form action="ricercaOrari.php" method="post">
        Da: <input type="date" class="inputBottom" name="dataInizio" value="<?php echo $_POST['dataInizio'] ?>" placeholder="gg/mm/aaaa" required>
        A: <input type="date" class="inputBottom" name="dataFine" value="<?php echo $_POST['dataFine'] ?>" placeholder="gg/mm/aaaa" required>
        <?php //include ('fascie.php');?>
        &emsp;<button class="click" type="submit">Cerca</button>
        <button class="click">
            <a href="prenotazione_sala.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
        </button>
    </form>
</fieldset>
<br>