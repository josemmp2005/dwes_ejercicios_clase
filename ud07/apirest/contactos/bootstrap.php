<?php

require "vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
define("DBHOST", $_ENV['DBHOST']);
define("DBUSER", $_ENV['DBUSER']);
define("DBPASS", $_ENV['DBPASS']);
define("DBNAME", $_ENV['DBNAME']);
define("DBPORT", $_ENV['DBPORT']);
define("KEY", $_ENV['KEY']);

// define("BASE_URL", "http://portfolio.local");

ini_set("display_errors", 1);
ini_Set("display_startup_errors", 1);
error_reporting(E_ALL);