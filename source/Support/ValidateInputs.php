<?php namespace Source\Support;
    require './source/Support/ValidaCPFCNPJ.php';
    use Source\Support;

    class ValidateInputs {
        function __construct(){}

        public static function Inputs() {
            header('Content-Type: application/json;');
            
            if(!isset($_POST['name']) || $_POST['name'] == ''){
                echo json_encode([
                    "message" => "o nome é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }
            
            if(!isset($_POST['lastName']) || $_POST['lastName'] == ''){
                echo json_encode([
                    "message" => "o sobrenome é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }

            if(isset($_POST['cpf'])){
                $cpf = new ValidaCPFCNPJ($_POST['cpf']);
                if(!$cpf->valida()){
                    echo json_encode([
                        "message" => "o CPF inserido não é válido",
                        "type" => "warning"
                    ]);
                    return;
                }
            } else if(!isset($_POST['cpf']) || $_POST['cpf'] == ''){
                echo json_encode([
                    "message" => "o CPF é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }    

            if(isset($_POST['email'])){
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    echo json_encode([
                        "message" => "o email inserido é inválido",
                        "type" => "warning"
                    ]);
                    return;
                }
            } else if(!isset($_POST['email']) || $_POST['email'] == ''){
                echo json_encode([
                    "message" => "o email é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }

            if(isset($_POST['password'])){
                if(strlen($_POST['password']) < 8){
                    echo json_encode([
                        "message" => "senha é deve possuir 8 dígitos",
                        "type" => "warning"
                    ]);
                    return;
                }
            } else if(!isset($_POST['password']) || $_POST['password'] == ''){
                echo json_encode([
                    "message" => "o senha é obrigatório",
                    "type" => "warning"
                ]);
                return;
            }
            return true;
        }
    }
