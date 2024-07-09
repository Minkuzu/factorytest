<?php
use App\BaseController;
use App\Controllers\DantriParserController;
use App\Controllers\VnexpressParserController;
use PHPUnit\Framework\TestCase;

class BaseControllerTest extends TestCase {
    private DantriParserController $dantriParserController;
    private VnexpressParserController $vnexpressParserController;
    public function testMergeData() {
        
    }
    protected function setUp(): void {
        $this->dantriParserController = new DantriParserController();
        $this->vnexpressParserController = new VnexpressParserController();
    }

    protected function tearDown(): void {
        $this->dantriParserController = null;
        $this->vnexpressParserController = null;
    }
}
?>