<?php
require_once __DIR__ .'/connect.php';
    class API {
        function Select(){
            $db = new Connect;
            $orari= array();
            $data = $db->prepare('select * from orari where codiceStruttura= \'h001\' order by giorno');
            $data-> execute();
            while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
               $orari[$OutputData['giorno']] = array(
                   'id' => $OutputData['id'],
                   'codiceStruttura' => $OutputData['codiceStruttura'],
                   'giorno' => $OutputData['giorno'],
                   'oraInizio' => $OutputData['oraInizio'],
                   'oraFine' => $OutputData['oraFine']
               );
            }
            return json_encode($orari);
        }
    }
    $API = new API;
    header('Content-Type: application/json');
    echo $API->Select();
?>