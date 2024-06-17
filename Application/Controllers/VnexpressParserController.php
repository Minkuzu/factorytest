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
    public function home()
    {
        $url = $_POST['input'];
        $title = $this->vnexpressParser->getTitle($url);
        $date = $this->vnexpressParser->getDate($url);
        $article = $this->vnexpressParser->getArticle($url);
        $data = [
            'title' => $title,
            'date' => $date,
            'article' => $article
            ];
        require __DIR__ . "/../../connection.php";
        $sql = "SELECT vnExpressUrl FROM VnExpress WHERE vnExpressUrl LIKE '$url'";
        //Get results from query
        $result = mysqli_query($conn, $sql);
        //Check if there are any record match with the url
        if(mysqli_num_rows($result) == 0)
        {
            $sql2 = "INSERT INTO VnExpress (vnExpressUrl, title, content, date_created)
            VALUES ('$url', '$title', '$article', '$date')";
            if ($conn->query($sql2) === TRUE) {
                echo "Data successfully inserted into table!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        //If yes, no insert
        } elseif (mysqli_num_rows($result) == 1)
        {
            echo "This url is already in database!";
        }
        $this->render('home', $data);
    }
}
?>