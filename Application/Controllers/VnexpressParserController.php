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
        $url = "https://vnexpress.net/fed-tiep-tuc-giu-nguyen-lai-suat-4757645.html";
        $data = [
            'title' => $this->vnexpressParser->getTitle($url),
            'date' => $this->vnexpressParser->getDate($url)
            ];

        $this->render('home', $data);
    }
}
?>