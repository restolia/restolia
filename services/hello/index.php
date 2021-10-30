<?php

use Hello\Service;
use Restolia\Kernel;

include 'vendor/autoload.php';

Kernel::boot(Service::class);
