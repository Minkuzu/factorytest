<?php

use App\Controllers\VnexpressParserController;
use App\Models\VnexpressParser;
use PHPUnit\Framework\TestCase;

class DantriParserControllerTest extends TestCase
{
    public function testParserType() {
        $vnexpressParserController = new VnexpressParserController;
        $construct = $vnexpressParserController->__construct();
        $this->assertIsObject($construct);
    }
    public function testFolderName() {
        $vnexpressParserController = new VnexpressParserController();
        $folderName = $vnexpressParserController->folder;
        $this->assertEquals('VnexpressParser', $folderName);
    }
}
?>