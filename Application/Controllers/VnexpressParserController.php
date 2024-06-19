<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\VnexpressParser;

require __DIR__ . "/../BaseController.php";

class VnexpressParserController extends BaseController
{
    public $vnexpressParser; 
    public function __construct()
    {
        $this->folder = 'VnexpressParser'; // Folder of Views
        $this->vnexpressParser = new VnexpressParser();
    }
    public function getVariables()
    {
        $url = $_POST['input'];
        $title = $this->vnexpressParser->getTitle($url);
        $date = $this->vnexpressParser->getDate($url);
        $article = $this->vnexpressParser->getArticle($url);
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
        $sql = "SELECT vnExpressUrl FROM VnExpress WHERE vnExpressUrl LIKE '$elements[0]'";
        //  Get results from query
        $result = mysqli_query($conn, $sql);
        //  Check if there are any record match with the url
        if(mysqli_num_rows($result) == 0)
        {
            $sql2 = "INSERT INTO VnExpress (vnExpressUrl, title, content, date_created)
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