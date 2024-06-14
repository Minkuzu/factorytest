<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\DantriParser;
require __DIR__ . "/../BaseController.php";

class DantriParserController extends BaseController
{
    public $dantriParser; 
    public function __construct()
    {
        $this->folder = 'DantriParser'; // Folder of Views
        $this->dantriParser = new DantriParser();
    }
    public function home()
    {
        $url = $_POST['input'];
        $title = $this->dantriParser->getTitle($url);
        $date = $this->dantriParser->getDate($url);
        $article = $this->dantriParser->getArticle($url);
        $data = [
            'title' => $title,
            'date' => $date,
            'article' => $article
            ];
        require __DIR__ . "/../../connection.php";
        $sql = "SELECT * FROM DanTri WHERE danTriUrl LIKE '$url'";
        if(isset($sql)) {
            $sql .= "INSERT INTO DanTri (danTriUrl, title, content, date_created)
            VALUES ('$url', '$title', '$article', '$date')";
        } else {
            echo "$sql is not null";
        }
        // $sql .= "INSERT INTO DanTri (danTriUrl, title, content, date_created)
        // VALUES ('$url', '$title', '$article', '$date')";
        if ($conn->multi_query($sql) === TRUE) {
          echo "Data successfully inserted into table";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $this->render('home', $data);
    }
}
?>