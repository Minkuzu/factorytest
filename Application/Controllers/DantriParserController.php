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
        $data = [
            'title' => $this->dantriParser->getTitle($url),
            'date' => $this->dantriParser->getDate($url),
            'article' => $this->dantriParser->getArticle($url)
            ];
        $this->render('home', $data);
    }
}
?>