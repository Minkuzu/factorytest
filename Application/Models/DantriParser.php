<?php
namespace App\Models;
use App\Models\Parser; // composer suddenlly stopped working after add VnexpressParser
use DOMXPath;

require_once __DIR__ ."/Parser.php";
require_once __DIR__ . "/../../Curl.php";
class DantriParser extends Parser {
    protected $articleClass;
    protected $class;
    //  Seperate e-magazine and normal newspaper
    public function getArticle() {
        $this->class = "e-magazine";
        if ($this->crawlProcess($this->class)->length == 0) {
            $this->articleClass = 'singular-content';
        } else {
            //  
            $this->articleClass = 'e-magazine__body';
        }
        return $this->returnData($this->articleClass);
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