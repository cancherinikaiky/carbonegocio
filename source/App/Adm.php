<?php //funcionando

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Worker;

class Adm {
    private $view;

    public function __construct() {
        $this->view = new Engine(CONF_VIEW_ADMIN,'php');
    }

    public function getHomeRender(): void {
        echo $this->view->render("home",["eventName" => CONF_SITE_NAME]);
    }

    public function register(?array $data) :void {
        if (!in_array("",$data)) {
            $work = new Worker(
                null,
                $data["companyName"],
                $data["name"],   
                $data["cpf"],
                $data["email"], 
                $data["phone"],
                $data["descricao"],
                $data["photo"],
                $data["idCategory"]
            );
            $work->createWorkerCategory($work->create());
            echo $this->view->render("register", ["eventName" => CONF_SITE_NAME]);
        } else {
            echo json_encode("Missing fields");   
        }
    }
}