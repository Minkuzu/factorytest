<?php
namespace App\Models;
use App\Models\Parser;
require_once __DIR__ . "/Parser.php";
class VnexpressParser extends Parser
{
    public function getParser()
    {

    }
    public function getTitle($url)
    {
        global $class;
        $class = 'title-detail'; //refactor to get different class without declare in each functions
        return $this->crawlProcess($url, $class);
    }
    public function getDate($url)
    {
        global $class;
        $class = 'date'; 
        return $this->crawlProcess($url, $class);
    }
    public function getArticle($url)
    {

    }
}
?>