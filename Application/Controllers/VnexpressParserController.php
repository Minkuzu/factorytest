<?php
namespace App\Controllers;
use App\BaseController; // composer doesn't work
use App\Models\VnexpressParser;
use Exception;

require __DIR__ . "/../Models/VnexpressParser.php";
require __DIR__ . "/../BaseController.php";

class VnexpressParserController extends BaseController {
    private $parser; 
    public function __construct() {
        $this->folder = 'VnexpressParser'; // Folder of Views
        $this->parser = new VnexpressParser();
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
        $this->parser->addNews($data["url"], $data["title"], $data["article"], $data["date"]);
        $this->render('home', $data);
    }
}
?>