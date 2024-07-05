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

    public function addNews($dbUrl, $dbName, $url, $title, $content, $date) {
        require __DIR__ . "/../../connection.php";
        $sql = "SELECT $dbUrl FROM $dbName WHERE $dbUrl LIKE '$url'";
        //  Get results from query
        $result = mysqli_query($conn, $sql);
        //  Check if there are any record match with the url
        if (mysqli_num_rows($result) == 0) {
            $sql2 = "INSERT INTO $dbName ($dbUrl, title, content, date_created)
            VALUES ('$url', '$title', '$content', '$date')";
            if ($conn->query($sql2) === TRUE) {
                echo "Data successfully inserted into table!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        //  If yes, don't insert
        } elseif (mysqli_num_rows($result) == 1) {
            echo "This url is already in database!";
        }
    }
    abstract protected function getArticle();
}
?>