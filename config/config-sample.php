<?php

define("DBNAME", "mon_framework_php");
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBCHARSET", "utf8");

define("PROTOCOLE", str_starts_with($_SERVER['SERVER_PROTOCOL'], 'https') ? 'https://' : 'http://');
define("WEBSITE_URL", PROTOCOLE.$_SERVER['SERVER_NAME']."/");

define("UPLOADS", WEBSITE_URL."uploads/");
define("ASSETS", WEBSITE_URL."assets/");

define("CSS", ASSETS."css/");
define("JAVASCRIPT", ASSETS."js/");
define("IMG", ASSETS."img/");
