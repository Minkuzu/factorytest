<?php
namespace App\Models;
use App\Models\Parser;
require_once __DIR__ . "/Parser.php";
class VnexpressParser extends Parser
{
    public function getTitle($url)
    {
        global $class;
        $class = 'title-detail';
        return $this->returnData($url, $class);
    }
    public function getDate($url)
    {
        global $class;
        $class = 'date'; 
        return $this->returnData($url, $class);
    }
    public function getArticle($url)
    {
        global $class;
        $class = 'fck_detail';
        return $this->returnData($url, $class);
    }
}
?>