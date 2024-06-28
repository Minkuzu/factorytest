<?php
function getUrlData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    $urlData = curl_exec($ch);
    
    curl_close($ch);
    return $urlData;
    }
$html = getUrlData($url);
$dom = new DOMDocument();
@$dom->loadHTML($html); 
$allCategories = array();
foreach ($dom->getElementsByTagName("a") as $anchorTags) {
    $allCategories[] = $anchorTags->getAttribute('href');
}
$fixedCategories = array_slice($allCategories,0,220);
?>