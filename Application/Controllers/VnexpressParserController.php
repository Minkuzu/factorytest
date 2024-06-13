<?php
namespace App\Controllers;
use App\BaseController;
use App\Models\VnexpressParser;
require __DIR__ . "/../Views/DantriParser/home.php";
require __DIR__ . "/../BaseController.php";
class VnexpressParserController extends BaseController
{
    public $vnexpressParser; 
    public function __construct()
    {
        $this->folder = 'DantriParser';
        $this->vnexpressParser = new VnexpressParser();
    }
    public function home()
    {
        $url = "abc";
        $data = [
            'title' => $this->vnexpressParser->getTitle($url),
            'date' => $this->vnexpressParser->getDate($url)
            ];

        $this->render('home', $data);
    }
}
?>