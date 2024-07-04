<?php
namespace App;

use App\Models\DantriParser;
use App\Models\Parser;
use App\Models\VnexpressParser;

require __DIR__ . "/Models/Parser.php";
class ParserFactory {
    public function getParser($parserType){
        switch ($parserType) {
            case "dantri":
                return new DantriParser;
            case "vnexpress":
                return new VnexpressParser;
            default:
                break;
        }
    }
}
?>
