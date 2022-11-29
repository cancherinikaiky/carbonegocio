<?php //funcionando

namespace Source\App;

use League\Plates\Engine;
use Sabberworm\CSS\CSSList\Document;
use Source\Support\ValidateEvaluation;
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

  public function sendEvaluation(?array $data) {
    if (!in_array("",$data)) {
      $evaluation = new Evaluation(
        null,
        $data["id_worker"],
        $data["id_client"],
        $data["tittle"],
        $data["service"],
        $data["txt"],
        $data["date"]
      );
      $evaluation->create();
      echo json_encode([
        "message" => "success",
        "type" => "warning"
      ]);
    } else {
      echo json_encode([
        "message" => "error",
        "type" => "warning"
      ]);
    }
  }

  public function getLogout(): void {
    session_destroy();
    header("Location:http://www.localhost/tecstart/logar");
  }
}

