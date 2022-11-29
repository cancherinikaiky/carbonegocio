<?php

namespace Source\App;

use League\Plates\Engine;

class Web {
    private $view;

    public function __construct() {
        $this->view = new Engine(CONF_VIEW_WEB,'php');
    }

    public function getAboutRender(): void {
        echo $this->view->render("about",["eventName" => CONF_SITE_NAME]);
    }

    public function getHomeRender(): void {
        echo $this->view->render("home",["eventName" => CONF_SITE_NAME]);
    }

    public function getProfileRender(): void {
        echo $this->view->render("profile",["eventName" => CONF_SITE_NAME]);
    }

    public function getRegisterRender(): void {
        echo $this->view->render("register",["eventName" => CONF_SITE_NAME]);
    }

    public function postRegisterClient(): void {
        // função pra cadastrar usuário
    }

    public function getLoginRender(): void {
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