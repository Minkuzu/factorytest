<?php
namespace App;
use Exception;
class BaseController
{
    public $folder;
    protected $parser;
    protected $factory;
    public function mergeData($parser) {
        $url = $_POST['input'];
        $data = [
            'url' => $url,
            'title' => $title = $parser->getTitle(),
            'article' => $article = $parser->getArticle(),
            'date' => $date = $parser->getDate()
            ];   
        //  Check if there are any NULL value before added to the database
        // if (in_array(NULL, $data))  {
        //     throw new Exception("Website format is not supported");
        // }
        return $data;         
    }

    //  Get directory of the targeted view, extract data and display
    public function render($file, $data = []) {
        $viewFile = "Views/" . $this->folder . "/" . $file . ".php"; //  Views/whicheverControllerCalls/viewfile.php
        extract($data);  
        include $viewFile;
    }
}
?>