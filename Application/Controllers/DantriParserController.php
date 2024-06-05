<?php
namespace App\Controllers;
use App\BaseController;
use App\Models\DantriParser;
require __DIR__ . "/../BaseController.php";
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
        // $data = [
        //     'title' => $this->dantriParser->getTitle($url),
        //     'content' => $this->dantriParser->getArticle($url)
        // ];
        $this->render('home');
        
    }
}
?>