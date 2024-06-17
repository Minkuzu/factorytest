<?php
namespace App\Models;
use App\Models\Parser; // composer suddenlly stopped working after add VnexpressParser
require_once __DIR__ ."/Parser.php";
class DantriParser extends Parser
{
    public function getClass()
    {
        echo "getParser";
    }
    public function getTitle($url)
    {
        global $class;
        $class = 'title-page detail'; //refactor to get different class without declare in each functions
        return $this->crawlProcess($url, $class);
    }
    public function getArticle($url)
    {
        global $class;
        $class = 'singular-content';
        return $this->crawlProcess($url, $class);
    }
    public function getDate($url)
    {
        global $class;
        $class = 'author-time';
        return $this->crawlProcess($url, $class);
    }
}
?>