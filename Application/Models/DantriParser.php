<?php
namespace App\Models;
use App\Models\Parser; // composer suddenlly stopped working after add VnexpressParser
use DOMXPath;

require_once __DIR__ ."/Parser.php";
require_once __DIR__ . "/../../Curl.php";
class DantriParser extends Parser {
    protected $articleClass;

    //  Seperate e-magazine and normal newspaper
    public function getArticle() {
        global $articleClass;
        $class = "e-magazine";
        if ($this->crawlProcess($class)->length == 0) {
            $articleClass = 'singular-content';
        } else {
            //  
            $articleClass = 'e-magazine__body';
        }
        return $this->returnData($articleClass);
    }
    public function getDate()    {
        $html = getUrlData($_POST['input']);
        foreach ($html->getElementsByTagName('time') as $time)  {
            $datePublished = $time->getAttribute('datetime');
        }
        return $datePublished;
    }
}
?>