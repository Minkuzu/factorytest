<?php
namespace App\Models;
use App\Models\Parser;
require_once __DIR__ . "/Parser.php";
class VnexpressParser extends Parser {
    
    public function getArticle() {
        global $class;
        $class = 'fck_detail';
        return $this->returnData($class);
    }

}
?>