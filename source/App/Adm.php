<?php

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

    public function  register(?array $data) :void {
        $work = new Worker(
            null,
            "JukaTelecon",
            "juinha",
            "11111111111",
            "jukinha@gmail.com",
            "99999999",
            "descricao",
            "photo",
            3
        );

        $work->createWorkerCategory($work->create());

        echo $this->view->render("register", ["eventName" => CONF_SITE_NAME]);
    }
}