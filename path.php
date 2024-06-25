<?php
use DOMDocument;
$url = $_POST['input'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$html = curl_exec($ch);

curl_close($ch);

$dom = new DOMDocument();
@$dom->loadHTML($html); // ^: Duplicated from Parser.php
$categories = array();
foreach ($dom->getElementsByTagName("a") as $anchorTags) {
    $categories[] = $anchorTags->getAttribute('href');
}
?>