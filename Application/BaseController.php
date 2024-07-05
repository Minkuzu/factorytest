<?php
namespace App;
use Exception;
class BaseController
{
    protected $folder;
    protected $parser;
    protected $factory;
    public function __construct()
    {
        $this->factory = new ParserFactory();
    }
    public function mergeData($parser) {
        $url = $_POST['input'];
        $data = [
            'url' => $url,
            'title' => $title = $parser->getTitle(),
            'article' => $article = $parser->getArticle($url),
            'date' => $date = $parser->getDate()
            ];   
        if (in_array(NULL, $data))  {
            throw new Exception("Website format is not supported");
        }
        return $data;         
    }
    public function render($file, $data = []) {
        $viewFile = "Views/" . $this->folder . "/" . $file . ".php"; //  Views/whicheverControllerCalls/viewfile.php
        extract($data);  
        include $viewFile;
    }
}
?>