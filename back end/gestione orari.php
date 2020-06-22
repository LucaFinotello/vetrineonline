<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
    $dataInizio = $_POST["dataInizio"];
    $datafine = $_POST["dataFine"];
    $strsql = "select * from orari";
    $risultato = mysqli_query($conn, $strsql);
    if (! $risultato)
    {
        echo "Errore nel comando SQL" . "<br>";
    }
    $riga = mysqli_fetch_array($risultato);
    if (! $riga)
    {
        echo "" . "<br>";
    }
    else
    {
        ?>
        <h1>Inserisci orario settimanale dal <?php echo $dataInizio?> al <?php echo $datafine?></h1>
        <form action="prenotazione_sala1.php" method="POST" >
            <table style="margin-top: 10px; margin-bottom: 10px;">
                <thead>
                <tr>
                    <td>
                        Giorno
                    </td>
                    <td>
                        Ora di Inizio
                    </td>
                    <td>
                        Ora di Fine
                    </td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <input class="inputBottom" name="giorno" type="text" value="Lunedi">
                    </td>
                    <td>
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
                        </select>
                    </td>
                    <td>
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
                        </select>
                    </td>
                <tr>
                    <td>
                        <input class="inputBottom" name="giorno1" type="text" value="Martedi">
                    </td>
                    <td>
                        <select name="oraInizio1">
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
                        </select>
                    </td>
                    <td>
                        <select name="oraFine1">
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="inputBottom" name="giorno2" type="text" value="Mercoledi">
                    </td>
                    <td>
                        <select name="oraInizio2">
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
                        </select>
                    </td>
                    <td>
                        <select name="oraFine2">
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="inputBottom" name="giorno3" type="text" value="Giovedi">
                    </td>
                    <td>
                        <select name="oraInizio3">
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
                        </select>
                    </td>
                    <td>
                        <select name="oraFine3">
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="inputBottom" name="giorno4" type="text" value="Venerdi">
                    </td>
                    <td>
                        <select name="oraInizio4">
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
                        </select>
                    </td>
                    <td>
                        <select name="oraFine4">
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="inputBottom" name="giorno5" type="text" value="Sabato">
                    </td>
                    <td>
                        <select name="oraInizio5">
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
                        </select>
                    </td>
                    <td>
                        <select name="oraFine5">
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="inputBottom" name="giorno6" type="text" value="Domenica">
                    </td>
                    <td>
                        <select name="oraInizio6">
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
                        </select>
                    </td>
                    <td>
                        <select name="oraFine6">
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
                        </select>
                    </td>
                </tr>
                </tr>
                </tbody>
            </table>
            <button type="submit" class="click" value="Salva">Salva</button>
            <button type="reset" class="click" value="Annulla">
                <a href="prenotazione_sala.php" style="color: #000000;text-decoration: none;">Annulla</a>
            </button>
        </form>
        <?php
    }
    ?>