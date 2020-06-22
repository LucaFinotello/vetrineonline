<!DOCTYPE html>
<html lang="it">
    <head>
    <meta charset="UTF-8">
    <title>Vetrineonline</title>
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/prenotazione.js"></script>
</head>
    <body>
        <?php
            session_start();
            include("db_con.php");
            include_once('mysql-fix.php');
            $dataInizio = $_POST["dataInizio"];
            $datafine = $_POST["dataFine"];
        ?>
        <h1>Inserisci orario settimanale dal <?php echo $dataInizio?> al <?php echo $datafine?></h1>
        <form action="prenotazione_sala1.php" method="POST" >
            <table>
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
            <p></p>
            <button type="submit" class="click" value="Salva">Salva</button>
            <button type="reset" class="click" value="Annulla">
                <a href="prenotazione_sala.php" style="color: #ffffff;text-decoration: none;">Annulla</a>
            </button>
        </form>
    </body>
</html>
