<?php
namespace App\Models;
use App\Models\Parser; // composer suddenlly stopped working after add VnexpressParser
use DOMXPath;

require_once __DIR__ ."/Parser.php";
require_once __DIR__ . "/../../Curl.php";
class DantriParser extends Parser {
    protected $articleClass;

    //  Seperate e-magazine and normal newspaper
    public function getArticle() {
        global $articleClass;
        $class = 'emagazine';
        if ($this->crawlProcess($class)->length == 0) {
            $articleClass = 'singular-content';
        } else {
            //  
            $articleClass = 'e-magazine__body';
        }
        return $this->returnData($articleClass);
    }

    //  Add newspaper to the database
    public function addNews($url, $title, $content, $date) {
        require __DIR__ . "/../../connection.php";
        $sql = "SELECT danTriUrl FROM DanTri WHERE danTriUrl LIKE '$url'";
        //  Get results from query
        $result = mysqli_query($conn, $sql);
        //  Check if there are any record match with the url
        if (mysqli_num_rows($result) == 0) {
            $sql2 = "INSERT INTO DanTri (danTriUrl, title, content, date_created)
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
}
?>