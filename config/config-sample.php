<?php

// ludfon - changer le mode depuis la base de données et non une constante
define("ENV", "dev");

define("DBNAME", "mon_framework_php");
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBCHARSET", "utf8");
define("DBPREFIX", "mfp_");

define("PROTOCOLE", str_starts_with($_SERVER['SERVER_PROTOCOL'], 'https') ? 'https://' : 'http://');
define("WEBSITE_URL", PROTOCOLE.$_SERVER['SERVER_NAME']."/");

define("UPLOADS", WEBSITE_URL."uploads/");
define("ASSETS", WEBSITE_URL."assets/");

define("CSS", ASSETS."css/");
define("JAVASCRIPT", ASSETS."js/");
define("IMG", ASSETS."img/");

define("PUBLICDIR", dirname($_SERVER["SCRIPT_NAME"]). DIRECTORY_SEPARATOR);
define("ASSETSDIR", PUBLICDIR . "assets". DIRECTORY_SEPARATOR);
define("TEMPLATESDIR", dirname(__DIR__). DIRECTORY_SEPARATOR . "templates". DIRECTORY_SEPARATOR);
define("UPLOADSDIR", dirname(__DIR__). DIRECTORY_SEPARATOR . "uploads". DIRECTORY_SEPARATOR);
define("CACHEDIR", dirname(__DIR__). DIRECTORY_SEPARATOR . "cache". DIRECTORY_SEPARATOR);
