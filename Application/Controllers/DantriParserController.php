<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\DantriParser;
use Exception;
use App\ParserFactory;

require_once __DIR__ . "/../Models/DantriParser.php";
require_once __DIR__ . "/../BaseController.php";
require_once __DIR__ . "/../ParserFactory.php";
require_once __DIR__ . "/../Models/Parser.php";

class DantriParserController extends BaseController {
    public function __construct() {
        $this->folder = 'DantriParser'; // Folder of Views
        $this->factory = new ParserFactory();
        $this->parser = $this->factory->getParser("dantri"); // Factory pattern for instantiate wanted parser;
    }
    //  Change function name to verb first -> noun
    public function viewHome() {
        try {
            $data = $this->mergeData($this->parser);
        } catch (Exception $e)  {
            var_dump($data);
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        $data = $this->mergeData($this->parser);
        var_dump($data);
        $this->parser->addNews("danTriUrl", "DanTri", $data["url"], $data["title"], $data["article"], $data["date"]);
        $this->render('home', $data);
    }
}
?>