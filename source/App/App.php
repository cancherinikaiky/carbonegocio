<?php

namespace Source\App;

use League\Plates\Engine;
use Sabberworm\CSS\CSSList\Document;
use Source\Models\Evaluation;
use Source\Models\Worker;

class App {
  private $view;
  private $workers;

  public function __construct() {
//      session_start();
//      if(empty($_SESSION["client"])) {
//          header("Location:http://www.localhost/tecstart/logar");
//      }

      $this->workers = new Worker();

    $this->view = new Engine(CONF_VIEW_APP,'php');
  }

  public function getHomeRender(): void {
    echo $this->view->render("home",["eventName" => CONF_SITE_NAME]);
  }

  public function getEvaluationRender(): void {
    echo $this->view->render("evaluation",[
        "eventName" => CONF_SITE_NAME,
        "workers" => $this->workers->selectAll()
    ]);
  }

  public function sendEvaluate(?array $data) {
      $evaluation = new Evaluation(
          null,
          2,
          "1",
          "Troca de lâmpada",
          "Troca de lâmpada",
          "txt",
          "29/11/2022"
      );

      $evaluation->create();

  }

  public function getLogout(): void {
    session_destroy();
    header("Location:http://www.localhost/tecstart/logar");
  }
}

