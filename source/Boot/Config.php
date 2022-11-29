<?php

define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "bd_tecstart");

define("CONF_URL_BASE", "http://www.localhost/tecstart"); // depois da / deve vir o nome da pasta do trabalho
define("CONF_URL_TEST", "http://www.localhost/tecstart"); // depois da / deve vir o nome da pasta do trabalho

define("CONF_VIEW_WEB", __DIR__ . "/../../themes/web");
define("CONF_VIEW_APP", __DIR__ . "/../../themes/app");
define("CONF_VIEW_ADMIN", __DIR__ . "/../../themes/adm");

define("CONF_SITE_NAME", "CarboNegócio");

define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");