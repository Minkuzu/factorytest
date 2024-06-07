<?php
namespace App\Models;
use App\Models\Parser;
use DOMDocument;
use DOMXPath;
class DantriParser extends Parser
{
    public function test()
    {
        echo "Hello Dantri";
    }
    public function getParser()
    {
        echo "getParser";
    }
    public function getTitle($url)
    {
        global $class;
        $url = "https://dantri.com.vn/xa-hoi/quoc-hoi-hop-rieng-ve-cong-tac-nhan-su-20240605220331292.htm";
        $html = $this->GetUrl($url);

        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        $xpath = new DomXPath($dom);
        $class = 'title-page detail';
        $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");

        foreach($divs as $div) 
        {
            echo $div->nodeValue;
            // If you want to include the html elements too:
            // echo $dom->saveXML($div);   
        }
    }
    public function getArticle($url)
    {
        global $class;
        $html = $this->GetUrl($url);

        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        $xpath = new DomXPath($dom);
        $class = 'singular-content';
        $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");

        foreach($divs as $div) 
        {
            echo $div->nodeValue;
            // If you want to include the html elements too:
            // echo $dom->saveXML($div);   
        }
    }
    public function getDate($url)
    {
        echo $url;
    }
}
?>