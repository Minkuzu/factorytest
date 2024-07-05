<?php
namespace App\Models;
use App\Models\Parser;
require_once __DIR__ . "/Parser.php";
class VnexpressParser extends Parser {
    
    public function getArticle() {
        $class = 'fck_detail';
        return $this->returnData($class);
    }

    public function getDate()   {
        $class = 'date';
        return $this->returnData($class);
    }
}
?>