<?php
namespace App\Models;
use App\Models\Parser;
require_once __DIR__ . "/Parser.php";
class VnexpressParser extends Parser {
    protected $class;
    public function getArticle() {
        $this->class = 'fck_detail';
        return $this->returnData($this->class);
    }

    public function getDate()   {
        $this->class = 'date';
        return $this->returnData($this->class);
    }
}
?>