<?php

use App\Controllers\DantriParserController;
use PHPUnit\Framework\TestCase;

class DantriParserControllerTest extends TestCase
{
    public function testParserType() {
        $dantriParserController = new DantriParserController;
        $construct = $dantriParserController->__construct();
        $this->assertIsObject($construct);
    }
}
?>