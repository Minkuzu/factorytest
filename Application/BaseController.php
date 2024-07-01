<?php
namespace App;
class BaseController
{
    protected $folder;
    protected $elements;
    public function __construct()
    {
        $this->elements = $this->getParserAttribute();
    }
    //  might not necessary
    public function getParserAttribute($parser) {
        $url = $_POST['input'];
        $parser->getClass($url);
        $title = $parser->getTitle($url);
        $date = $parser->getDate($url);
        $article = $parser->getArticle($url);
        return array($url, $title, $article, $date);
    }
    //  change function name to verb first -> noun
    public function extractData($parser) {
        $url = $_POST['input'];
        $parser->getClass($url);
        $title = $parser->getTitle($url);
        $date = $parser->getDate($url);
        $article = $parser->getArticle($url);
        return array($url, $title, $article, $date);
        $data = [
            'title' => $this->elements[1],
            //'title' => $title = $parser->getTitle($url),
            'article' => $this->elements[2],
            'date' => $this->elements[3]
            ];   
        return $data;         
    }
    public function render($file, $data = []) {
        $viewFile = "Views/" . $this->folder . "/" . $file . ".php"; //  Views/whicheverControllerCalls/viewfile.php
        extract($data);  
        include $viewFile;
    }
}
?>