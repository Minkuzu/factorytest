<?php
namespace App\Models;
use DOMDocument;
use DOMXPath;
require_once __DIR__ . "/../../Curl.php";
abstract class Parser {
    public function crawlProcess($url, $class) {
        $html = getUrlData($url);

        $xpath = new DomXPath($html);
        //  Get data based on class
        $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");

        return $divs;
    }
    public function returnData($url, $class) {
        $divs = $this->crawlProcess($url,$class);
        foreach ($divs as $div) {
            $data = $div->nodeValue;
            // If you want to include the html elements too:
            // echo $dom->saveXML($div);   
        }
        return $data;
    }   

    protected function getTitle($url)   {
        $html = getUrlData($url);
    }
    abstract protected function getArticle($url);
    abstract protected function getDate($url);
}
?>