<?php
namespace App\Models;
use App\Models\Parser;
use DOMDocument;
use DOMXPath;
class VnexpressParser extends Parser
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
            $data = $div->nodeValue;
            // If you want to include the html elements too:
            // echo $dom->saveXML($div);   
        }
        return $data;
    }
    public function getParser()
    {

    }
    public function getTitle($url)
    {

    }
    public function getDate($url)
    {

    }
    public function getArticle($url)
    {
        
    }
}
?>