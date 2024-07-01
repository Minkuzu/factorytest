<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\VnexpressParser;

require __DIR__ . "/../Models/VnexpressParser.php";
require __DIR__ . "/../BaseController.php";

class VnexpressParserController extends BaseController {
    private $parser; 
    public function __construct() {
        $this->folder = 'VnexpressParser'; // Folder of Views
        $this->parser = new VnexpressParser();
    }

    public function getVariables() {
        $url = $_POST['input'];
        $title = $this->parser->getTitle($url);
        $date = $this->parser->getDate($url);
        $article = $this->parser->getArticle($url);
        return array($url, $title, $article, $date);
    }

    public function home() {
        $elements = $this->getVariables();
        $data = [
            'title' => $elements[1],
            'article' => $elements[2],
            'date' => $elements[3]
            ];
        $this->parser->addNews($elements[0], $elements[1], $elements[2], $elements[3]);
        $this->render('home', $data);
    }
}
?>