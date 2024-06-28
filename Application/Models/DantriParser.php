<?php
namespace App\Models;
use App\Models\Parser; // composer suddenlly stopped working after add VnexpressParser
require_once __DIR__ ."/Parser.php";

class DantriParser extends Parser {
    public function getClass($url) {
        global $titleClass;
        global $articleClass;
        $class = "emagazine";
        if ($this->crawlProcess($url, $class)->length == 0) {
            $titleClass = 'title-page detail';
            $articleClass = 'singular-content';
        } else {
            $titleClass = 'e-magazine__title';
            $articleClass = 'e-magazine__body';
        }
    }

    public function getTitle($url) {
        global $titleClass;
        return $this->returnData($url, $titleClass);
    }

    public function getArticle($url) {
        global $articleClass;
        return $this->returnData($url, $articleClass);
    }

    public function getDate($url) {
        $dateClass = 'author-time';
        return $this->returnData($url, $dateClass);
    }
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