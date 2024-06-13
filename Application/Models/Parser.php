<?php
namespace App\Models;
use DOMDocument;
use DOMXPath;
abstract class Parser{
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
    public function getUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $data = curl_exec($ch);

        curl_close($ch);
        return $data;
    }
    public abstract function getParser();
    public abstract function getTitle($url);
    public abstract function getArticle($url);
    public abstract function getDate($url);
}
?>