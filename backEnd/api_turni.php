<?php
require_once __DIR__ .'/connect.php';
    class TURNI {
        function Select(){
            $db = new Connect;
            $turni= array();
            $data = $db->prepare('select * from prenotazione where codiceStruttura= \'H001\' order by giorno');
            $data-> execute();
            while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
                $turni[$OutputData['giorno']] = array(
                   'id' => $OutputData['id'],
                   'codiceStruttura' => $OutputData['codiceStruttura'],
                   'giorno' => $OutputData['giorno'],
                   'turnoInizio' => $OutputData['turnoInizio'],
                   'turno' => $OutputData['turno'],
                   'postiSala' => $OutputData['postiSala'],
                   'fascia' => $OutputData['fascia']
               );
            }
            return json_encode($turni);
        }
    }
    $API = new TURNI;
    header('Content-Type: application/json');
    echo $API->Select();
?>