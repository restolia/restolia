<?php

namespace Tests;

use App\App;
use Restolia\Kernel;
use Restolia\Testing\Http\HttpAssertions;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use HttpAssertions;

    protected Kernel $kernel;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        define('APP_START', microtime(true));
        define('APP_ROOT', dirname(__DIR__));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->kernel = Kernel::boot(App::class);
    }
}