<?php
namespace App\Models;
abstract class Parser{
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