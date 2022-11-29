<?php

namespace Source\App;

use League\Plates\Engine;

class App {
  private $view;

  public function __construct() {
      session_start();
      if(empty($_SESSION["client"])) {
          header("Location:http://www.localhost/tecstart/logar");
      }
    $this->view = new Engine(CONF_VIEW_APP,'php');
  }

  public function getHomeRender(): void {
    echo $this->view->render("home",["eventName" => CONF_SITE_NAME]);
  }

  public function getEvaluationRender(): void {
    echo $this->view->render("profile",["eventName" => CONF_SITE_NAME]);
  }

  public function getLogout(): void {
    session_destroy();
    header("Location:http://www.localhost/tecstart/logar");
  }
}

