<?php
declare(strict_types=1);

namespace App\Containers\Enterprise\Tests;

use App\Ship\Parents\Tests\PhpUnit\TestCase as ShipTestCase;
use ErrorException;

class EnterpriseTestCase extends ShipTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->setUpTestingUser();
    }
}
