<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\DantriParser;

require_once __DIR__ . "/../Models/DantriParser.php";
require __DIR__ . "/../BaseController.php";

class DantriParserController extends BaseController {
    public $elements;
    public $parser;
    public function __construct() {
        $this->folder = 'DantriParser'; // Folder of Views
        $this->parser = new DantriParser();
        $this->elements = $this->getVariables();
    }

    public function getVariables() {
        $url = $_POST['input'];
        $this->parser->getClass($url);
        $title = $this->parser->getTitle($url);
        $date = $this->parser->getDate($url);
        $article = $this->parser->getArticle($url);
        return array($url, $title, $article, $date);
    }
    
    public function home() {
        $data = [
            'title' => $this->elements[1],
            'article' => $this->elements[2],
            'date' => $this->elements[3]
            ];            
        $this->parser->addNews($this->elements[0], $this->elements[1], $this->elements[2], $this->elements[3]);
        $this->render('home', $data);
    }
}
?>