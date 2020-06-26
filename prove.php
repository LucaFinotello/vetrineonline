<select name="data">
    <?php
    $oggi=time();
    $conta=10;
    for ($i = 0; $i < 10; $i++) {
        $giorno=$oggi+24*60*60*$i;
        echo "<option value='".date("d/m/Y",$giorno)."'>".date("d/m/Y",$giorno)."</option>";
    }
    ?>
</select>
