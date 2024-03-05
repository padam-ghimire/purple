
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;
use App\Core\Router;

require_once __DIR__ . '/../src/routes/web.php';
require_once __DIR__ . '/../src/Core/Utils.php';


$app = new Application();
$app->run();