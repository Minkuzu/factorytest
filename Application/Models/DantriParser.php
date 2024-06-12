<?php
namespace App\Models;
use App\Models\Parser;
use DOMDocument;
use DOMXPath;
class DantriParser extends Parser
{
    public function crawlProcess($class)
    {
        $url = "https://dantri.com.vn/the-thao/bao-philippines-binh-luan-khi-doi-nha-thua-dau-doi-tuyen-viet-nam-20240607003627722.htm";
        $html = $this->GetUrl($url);

        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        $xpath = new DomXPath($dom);
        $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");

        foreach($divs as $div) 
        {
            $something = $div->nodeValue;
            // If you want to include the html elements too:
            // echo $dom->saveXML($div);   
        }
        return $something;
    }
    public function getParser()
    {
        echo "getParser";
    }
    public function getTitle($url)
    {
        
        global $class;
        $class = 'title-page detail'; //refactor to get different class without declare in each functions
        return $this->crawlProcess($class);
    }
    public function getArticle($url)
    {
        global $class;
        $class = 'singular-content';
        $this->crawlProcess($class);
    }
    public function getDate($url)
    {
        global $class;
        $class = 'author-time';
        return $this->crawlProcess($class);
    }
}
?>