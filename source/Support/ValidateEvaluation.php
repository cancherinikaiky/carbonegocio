<?php namespace Source\Support;
    require './source/Support/ValidaCPFCNPJ.php';
    use Source\Support;
    use Source\Models\Client;

    class ValidateEvaluation {
        function __construct($data){}

        public static function Inputs() {
            header('Content-Type: application/json;');
            
            if(!isset($_POST['id_worker']) || $_POST['id_worker'] == ''){
                echo json_encode([
                    "message" => "o id do servidor é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }
            
            if(!isset($_POST['id_client']) || $_POST['id_client'] == ''){
                echo json_encode([
                    "message" => "o id do client é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }

            if(!isset($_POST['tittle']) || $_POST['tittle'] == ''){
                echo json_encode([
                    "message" => "o título é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }

            if(!isset($_POST['service']) || $_POST['service'] == ''){
                echo json_encode([
                    "message" => "o serviço é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }

            if(!isset($_POST['txt']) || $_POST['txt'] == ''){
                echo json_encode([
                    "message" => "o texto é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }

            if(!isset($_POST['data']) || $_POST['data'] == ''){
                echo json_encode([
                    "message" => "a data é obrigatória",
                    "type" => "warning"
                ]);
                return;
            }
            return true;
        }
    }
