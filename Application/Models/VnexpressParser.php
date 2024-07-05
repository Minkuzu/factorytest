<?php
namespace App\Models;
use App\Models\Parser;
require_once __DIR__ . "/Parser.php";
class VnexpressParser extends Parser {
    
    public function getArticle() {
        global $class;
        $class = 'fck_detail';
        return $this->returnData($class);
    }
    
    public function addNews($url, $title, $article, $date) {
        require __DIR__ . "/../../connection.php";
        $sql = "SELECT vnExpressUrl FROM VnExpress WHERE vnExpressUrl LIKE '$url'";
        //  Get results from query
        $result = mysqli_query($conn, $sql);
        //  Check if there are any record match with the url
        if (mysqli_num_rows($result) == 0) {
            $sql2 = "INSERT INTO VnExpress (vnExpressUrl, title, content, date_created)
            VALUES ('$url', '$title', '$article', '$date')";
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