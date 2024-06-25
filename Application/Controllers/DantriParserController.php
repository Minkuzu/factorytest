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
        return array($url, $title, $article, $date);
    }
    public function home()
    {
        $elements = $this->getVariables();
        $data = [
            'title' => $elements[1],
            'article' => $elements[2],
            'date' => $elements[3]
            ];              
        $this->saveToDB($elements);
        $this->render('home', $data);
    }
    public function saveToDB($elements)
    {
        require __DIR__ . "/../../connection.php";
        $sql = "SELECT danTriUrl FROM DanTri WHERE danTriUrl LIKE '$elements[0]'";
        //  Get results from query
        $result = mysqli_query($conn, $sql);
        //  Check if there are any record match with the url
        if (mysqli_num_rows($result) == 0)
        {
            $sql2 = "INSERT INTO DanTri (danTriUrl, title, content, date_created)
            VALUES ('$elements[0]', '$elements[1]', '$elements[2]', '$elements[3]')";
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