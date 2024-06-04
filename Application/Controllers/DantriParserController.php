<?php
namespace App\Controllers;
use App\BaseController;
use App\Models\DantriParser;
require_once '../../Views/DantriParser/home.php';
class DantriParserController extends BaseController
{
    public $dantriParser; 
    public function __construct()
    {
        $this->folder = 'DantriParser';
        $this->dantriParser = new DantriParser();
    }
    public function home()
    {
        // $url = $_POST['input'];
        $data = [
            // 'title' => $this->dantriParser->getTitle($url),
            // 'content' => $this->dantriParser->getArticle($url)
            'title' => 'Title test',
            'content' => 'Content test'
        ];
        $this->render('home', $data);
        
    }
}
?>