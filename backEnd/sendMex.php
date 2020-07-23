<?php
    $numero= $_POST['numero'];
    $tavolo= $_POST['tavolo'];
    $messaggio = $_POST['messaggio'];

    echo "Invio...<a id='dynLink' href='https://api.whatsapp.com/send?phone=".$numero."&text=Scontrino fiscale tavolo n°".$tavolo.PHP_EOL.$messaggio."' hidden>Invia</a>";
?>

<script type = "text/javascript">

    window.setTimeout("autoClick()", 1);

    function autoClick() {
        var linkPage = document.getElementById('dynLink').href;
        window.location.href = linkPage;
    }
</script>



