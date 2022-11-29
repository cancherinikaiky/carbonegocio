<?php
session_start();
ob_start();

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(CONF_URL_BASE, ":");

$route->namespace("Source\App");

// WEB ROUTES

$route->get("/","Web:getHomeRender");
$route->get("/home","Web:getHomeRender");

$route->get("/sobre","Web:getAboutRender");

$route->get("/contato","Web:getContactRender");
$route->post("/contato","Web:postContactSendMail");

$route->get("/registrar","Web:getRegisterRender");
$route->post("/registrar","Web:postRegisterClient");

$route->get("/logar","Web:getLoginRender");
$route->post("/logar","Web:postLoginClient");

$route->get("/perfil", "Web:getProfileRender");

// APP ROUTES

$route->group("/app");

$route->get("/", "App:getHomeRender");
$route->get("/home", "App:getHomeRender");

$route->get("/sair","App:getLogout");

$route->get("/perfil/avaliar", "App:getEvaluateRender");
$route->post("/perfil/avaliar", "App:sendEvaluate");

$route->group(null);

// ADM ROUTES

$route->group("/admin");

$route->get("/", "Adm:getHomeRender");
$route->get("/home", "Adm:getHomeRender");

$route->group(null);

// ERROR ROUTES

$route->group("error")->namespace("Source\App");
$route->get("/{errcode}", "Web:error");

$route->dispatch();

// ERROR REDIRECT

if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}

ob_end_flush();