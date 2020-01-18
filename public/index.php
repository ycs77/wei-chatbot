<?php

use App\Controller;

require_once __DIR__ . '/../bootstrap/app.php';

$controller = new Controller();
echo $controller->index();
