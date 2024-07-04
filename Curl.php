<?php
//  Return parse data of url
function getUrlData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //  Change CURLOPT_HEADER to TRUE to get title from header
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    $urlData = curl_exec($ch);
    curl_close($ch);
    $dom = new DOMDocument();
    @$dom->loadHTML($urlData); 
    return $dom;
}

$html = getUrlData($url);
$allCategories = array();
//  Add all href attributes to array
foreach ($html->getElementsByTagName("a") as $anchorTags) {
    $allCategories[] = $anchorTags->getAttribute('href');
}
//  Return only categories path
$DanTriCategories = array_slice($allCategories,0,220);
?>