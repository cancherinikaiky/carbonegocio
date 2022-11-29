<?php

namespace Source\App;

require "./source/autoload.php";
use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Client;
use Source\Models\Worker;
use Source\Support\ValidateInputs;

class Web {
    private $view;
    private $workers;
    private $category;

    public function __construct() {
        $this->view = new Engine(CONF_VIEW_WEB,'php');
        $this->workers = new Worker();

        $this->category = new Category();
    }

    public function getAboutRender(): void {
        echo $this->view->render("about",["eventName" => CONF_SITE_NAME]);
    }

    public function getHomeRender(): void {
        echo $this->view->render("home",[
            "eventName" => CONF_SITE_NAME,
            "workers" => $this->workers->selectAll()
            ]);
    }

    public function getProfileRender(?array $data): void {
        if(!empty($data)) {
            $this->workers->findById($data["idWorker"]);
            $this->category->findById($data["idWorker"]);
        }
        echo $this->view->render("profile",[
            "eventName" => CONF_SITE_NAME,
            "worker" => $this->workers,
            "category" => $this->category
        ]);
    }

    public function getRegisterRender(): void {
        echo $this->view->render("register",["eventName" => CONF_SITE_NAME]);
    }

    public function postRegisterClient(): void {
        header('Content-Type: application/json;');
        $validate = new ValidateInputs();
        if($validate->Inputs()) {
            $client = new Client(
                NULL,
                $_POST['name'],
                $_POST['lastName'],
                $_POST['cpf'],
                $_POST['email'],
                $_POST['password']
            );
            echo json_encode("inserido com sucesso");
            $client->create();
        }
    }
    public function postLoginClient(?array $data): void {
        if($data['email'] != "" && $data['password'] != ""){
            $client = new Client();
            if(!$client->validate($data['email'], $data['password'])) {
                $json = [
                    "message" => "não logou"
                ];
                echo json_encode($json);
                return;
            }else {
                $json = [
                    "message" => "logou"
                ];
                echo json_encode($json);
                $SESSION_START;
                $_SESSION['email'] = $data['email'];
                return;
            }
        }

        echo $this->view->render("login",["eventName" => CONF_SITE_NAME]);
    }

    public function getContactRender(): void {
        echo $this->view->render("contact",["eventName" => CONF_SITE_NAME]);
    }

    public function postContactSendMail(): void {
        // função pra enviar e-mail
    }

    public function error(): void {
        echo $this->view->render("404",["eventName" => CONF_SITE_NAME]);
    }
}