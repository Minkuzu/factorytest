<?php
namespace App;
use App\Models\DantriParser;
class ParseFactory
{
    public function createParse()
    {
        return new DantriParser();
    }
}
?>