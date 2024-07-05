<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\VnexpressParser;
use Exception;
use App\ParserFactory;

require_once __DIR__ . "/../Models/VnexpressParser.php";
require_once __DIR__ . "/../BaseController.php";
require_once __DIR__ . "/../ParserFactory.php";
require_once __DIR__ . "/../Models/Parser.php";

class VnexpressParserController extends BaseController {
    public function __construct() {
        $this->folder = 'VnexpressParser'; // Folder of Views
        $this->factory = new ParserFactory();
        $this->parser = $this->factory->getParser("vnexpress");
    }
    //  Refractor to BaseController 
    public function viewHome() {
        try {
            $data = $this->mergeData($this->parser);
        } catch (Exception $e)  {
            var_dump($data);
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        $data = $this->mergeData($this->parser);
        var_dump($data);
        $this->parser->addNews("vnExpressUrl", "VnExpress", $data["url"], $data["title"], $data["article"], $data["date"]);
        $this->render('home', $data);
    }
}
?>