<?php

use App\App;
use Restolia\Kernel;

const APP_ROOT = __DIR__;

define('APP_START', microtime(true));

include 'vendor/autoload.php';

(new Kernel())->boot(App::class)->resolve();
