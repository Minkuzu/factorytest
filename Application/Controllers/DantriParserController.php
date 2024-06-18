<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\DantriParser;

require __DIR__ . "/../BaseController.php";

class DantriParserController extends BaseController
{
    private $dantriParser; 
    public function __construct()
    {
        $this->folder = 'DantriParser'; // Folder of Views
        $this->dantriParser = new DantriParser();
    }
    public function getVariables()
    {
        $url = $_POST['input'];
        $this->dantriParser->getClass($url);
        $title = $this->dantriParser->getTitle($url);
        $date = $this->dantriParser->getDate($url);
        $article = $this->dantriParser->getArticle($url);
        return array($url, $title, $date, $article);
    }
    public function home()
    {
        $url = $_POST['input'];
        $this->dantriParser->getClass($url);
        $title = $this->dantriParser->getTitle($url);
        $date = $this->dantriParser->getDate($url);
        $article = $this->dantriParser->getArticle($url);
        $data = [
            'title' => $title,
            'article' => $article,
            'date' => $date
            ];              
        require __DIR__ . "/../../connection.php";
        $sql = "SELECT danTriUrl FROM DanTri WHERE danTriUrl LIKE '$url'";
        //  Get results from query
        $result = mysqli_query($conn, $sql);
        //  Check if there are any record match with the url
        if(mysqli_num_rows($result) == 0)
        {
            $sql2 = "INSERT INTO DanTri (danTriUrl, title, content, date_created)
            VALUES ('$url', '$title', '$article', '$date')";
            if ($conn->query($sql2) === TRUE) {
                echo "Data successfully inserted into table!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        //  If yes, don't insert
        } elseif (mysqli_num_rows($result) == 1)
        {
            echo "This url is already in database!";
        }
        $this->render('home', $data);
    }
    public function saveToDB()
    {
        $array = $this->getVariables(); 
        require __DIR__ . "/../../connection.php";
        $sql = "SELECT danTriUrl FROM DanTri WHERE danTriUrl LIKE '$url'";
        //  Get results from query
        $result = mysqli_query($conn, $sql);
        //  Check if there are any record match with the url
        if(mysqli_num_rows($result) == 0)
        {
            $sql2 = "INSERT INTO DanTri (danTriUrl, title, content, date_created)
            VALUES ('$array[0]', '$array[1]', '$array[2]', '$array[3]')";
            if ($conn->query($sql2) === TRUE) {
                echo "Data successfully inserted into table!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        //  If yes, don't insert
        } elseif (mysqli_num_rows($result) == 1)
        {
            echo "This url is already in database!";
        }
    }
}
?>