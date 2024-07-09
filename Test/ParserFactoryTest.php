<?php

use App\ParserFactory;
use PHPUnit\Framework\TestCase;
use App\Controllers\DantriParserController;
use App\Controllers\VnexpressParserController;

class ParserFactoryTest extends TestCase
{
    public function testParserType() {
        $dantriParserController = new DantriParserController();
        $vnexpressParserController = new VnexpressParserController();
        $parserFactory = new ParserFactory();
        $this->assertObjectEquals($dantriParserController, $parserFactory->getParser('dantri'));
        $this->assertObjectEquals($vnexpressParserController, $parserFactory->getParser('vnexpress'));
    }
}
?>