<?php
namespace App;
use Exception;
class BaseController
{
    protected $folder;
    public function mergeData($parser) {
        $url = $_POST['input'];
        $parser->getClass($url);
        // $title = $parser->getTitle($url);
        // $date = $parser->getDate($url);
        // $article = $parser->getArticle($url);
        $data = [
            'url' => $url,
            'title' => $title = $parser->getTitle($url),
            'article' => $article = $parser->getArticle($url),
            'date' => $date = $parser->getDate($url)
            // 'title' => $this->elements[1],
            // 'article' => $this->elements[2],
            // 'date' => $this->elements[3]
            ];   
        // if (in_array(NULL, $data))  {
        //     throw new Exception("Newspaper format is not supported");
        // }
        return $data;         
    }
    public function render($file, $data = []) {
        $viewFile = "Views/" . $this->folder . "/" . $file . ".php"; //  Views/whicheverControllerCalls/viewfile.php
        extract($data);  
        include $viewFile;
    }
}
?>