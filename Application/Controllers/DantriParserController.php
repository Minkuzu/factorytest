<?php
namespace App\Controllers;
use App\BaseController;
use App\Models\DantriParser;
require __DIR__ . "/../Views/DantriParser/home.php";
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
        $url = "abc";
        $data = [
            'title' => $this->dantriParser->getTitle($url),
            'date' => $this->dantriParser->getDate($url)
            ];

        $this->render('home', $data);
    }
}
?>