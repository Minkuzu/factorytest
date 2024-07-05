<?php
namespace App;

use App\Models\DantriParser;
use App\Models\Parser;
use App\Models\VnexpressParser;

require_once __DIR__ . "/Models/Parser.php";
require_once __DIR__ . "/Models/DantriParser.php";
require_once __DIR__ . "/Models/VnexpressParser.php";

class ParserFactory {
    public function getParser($parserType){
        switch ($parserType) {
            case "dantri":
                return new DantriParser();
            case "vnexpress":
                return new VnexpressParser();
            default:
                return "break";
                break;
        }
    }
}
?>
