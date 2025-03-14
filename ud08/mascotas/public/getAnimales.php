<?php

require('../vendor/autoload.php');
require "../bootstrap.php";

use App\Controllers\AnimalesController;

$q = $_GET['q'];

$controller = new AnimalesController();

$controller->ObtenerAction($q);


