<?php
namespace App\Models;
use DOMDocument;
use DOMXPath;
require_once __DIR__ . "/../../Curl.php";
abstract class Parser {

    //  Seek through the html for wanted class
    public function crawlProcess($class) {
        $html = getUrlData($_POST['input']);

        $xpath = new DomXPath($html);
        //  Get data based on class
        $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");

        return $divs;
    }

    //  After found the wanted class, return all context between the tag contains wanted class
    public function returnData($class) {
        $divs = $this->crawlProcess($class);
        foreach ($divs as $div) {
            $data = $div->nodeValue;
            // If you want to include the html elements too:
            // echo $dom->saveXML($div);   
        }
        return $data;
    }   

    //  Get elements of an attribute based on the tag
    //  $guidedAttribute and $targetedAttribute might have the same value 
    protected function getElements($tag, $guidedAttribute, $guidedAttributeElement, $targetedAttribute)    {
        $html = getUrlData($_POST['input']);
        foreach ($html->getElementsByTagName($tag) as $tags) {
            if ($tags->getAttribute($guidedAttribute) == $guidedAttributeElement )  {
                $attributeElement = $tags->getAttribute($targetedAttribute);
            }
        }
        return $attributeElement;
    }

    //  Get title by the <title> tag
    public function getTitle()   {
        $html = getUrlData($_POST['input']);
        $title = $html->getElementsByTagName('title');
        return $title->item(0)->nodeValue;
    }

    //  Get date published by the <time> tag and date attribute
    public function getDate()    {
        $html = getUrlData($_POST['input']);
        foreach ($html->getElementsByTagName('time') as $time)  {
            $datePublished = $time->getAttribute('datetime');
        }
        return $datePublished;
    }

    abstract protected function getArticle();
}
?>