<?php

use App\App;

require_once __DIR__ . '/../bootstrap/app.php';

$app = new App();

echo $app->index();
