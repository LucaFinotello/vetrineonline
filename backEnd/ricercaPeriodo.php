<br>
<fieldset>
    <legend>Cerca periodo</legend>
    <form action="ricercaOrari.php" method="post">
        Da: <input type="date" class="inputBottom" name="dataInizio" value="<?php echo $_POST['dataInizio'] ?>" placeholder="gg/mm/aaaa" required>
        A: <input type="date" class="inputBottom" name="dataFine" value="<?php echo $_POST['dataFine'] ?>" placeholder="gg/mm/aaaa" required>
        <?php //include ('fasce.php');?>
        &emsp;<button class="click" type="submit"><i class="fa fa-search"></i></button>
    </form>
</fieldset>
<br>