<?php

use App\App;
use Restolia\Kernel;

define('APP_START', microtime(true));

include 'vendor/autoload.php';

Kernel::boot(App::class);
