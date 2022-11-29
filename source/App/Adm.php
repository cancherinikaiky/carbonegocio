<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Worker;
use CoffeeCode\Uploader\Image;

class Adm {
    private $view;

    public function __construct() {
        $this->view = new Engine(CONF_VIEW_ADMIN,'php');
    }

    public function getHomeRender(): void {
        echo $this->view->render("home",["eventName" => CONF_SITE_NAME]);
    }

    public function  register(?array $data) :void {

        if(!empty($data)) {
            if(in_array("", $data)) {
                $json = [
                    "messasge" => "Preencha todos os campos",
                    "type" => "warning"
                ];
            }

            $upload = uploadImage($_FILES['photo']);

            $workers = new Worker(
                null,
                $data["company_name"],
                $data["name"],
                $data["cpf"],
                $data["email"],
                $data["phone"],
                $data["description"],
                $upload,
                6
            );

            $workers->createWorkerCategory($workers->create());

            $json = [
                "message" => "cadastrado"
            ];
            echo json_encode($json);
            return;
        }

        echo $this->view->render("register", ["eventName" => CONF_SITE_NAME]);
    }
}