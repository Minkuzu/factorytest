<?php
namespace App\Models;
use App\Models\Parser; // composer suddenlly stopped working after add VnexpressParser
require_once __DIR__ ."/Parser.php";

class DantriParser extends Parser
{
    private $titleClass;
    private $articleClass;
    public function getClass($url)
    {
        global $titleClass;
        global $articleClass;
        $class = "emagazine";
        if($this->crawlProcess($url, $class)->length == 0)
        {
            $titleClass = 'title-page detail';
            $articleClass = 'singular-content';
        }else{
            $titleClass = 'e-magazine__title';
            $articleClass = 'e-magazine__body';
        }
    }
    public function getTitle($url)
    {
        global $titleClass;
        return $this->returnData($url, $titleClass);
    }
    public function getArticle($url)
    {
        global $articleClass;
        return $this->returnData($url, $articleClass);
    }
    public function getDate($url)
    {
        $dateClass = 'author-time';
        return $this->returnData($url, $dateClass);
    }
}
?>