<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\DantriParser;
use App\Models\Parser;
use Exception;
use App\ParserFactory;

require_once __DIR__ . "/../Models/DantriParser.php";
require __DIR__ . "/../BaseController.php";

class DantriParserController extends BaseController {
    protected $parser;
    public function __construct() {
        $this->folder = 'DantriParser'; // Folder of Views
        $this->parser = new DantriParser();
    }
    //  change function name to verb first -> noun
    public function viewHome() {
        try {
            $data = $this->mergeData($this->parser);
        } catch (Exception $e)  {
            var_dump($data);
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        $data = $this->mergeData($this->parser);
        var_dump($data);
        $this->parser->addNews($data["url"], $data["title"], $data["article"], $data["date"]);
        $this->render('home', $data);
    }
}
?>