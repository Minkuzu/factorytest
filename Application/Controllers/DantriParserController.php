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
        $this->folder = 'DantriParser';
        $this->dantriParser = new DantriParser();
    }
    public function home()
    {
        $url = "https://dantri.com.vn/the-thao/bao-philippines-binh-luan-khi-doi-nha-thua-dau-doi-tuyen-viet-nam-20240607003627722.htm";
        $data = [
            'title' => $this->dantriParser->getTitle($url),
            'date' => $this->dantriParser->getDate($url),
            'article' => $this->dantriParser->getArticle($url)
            ];
        $this->render('home', $data);
    }
}
?>