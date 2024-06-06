<?php
namespace App;
class BaseController
{
    public $folder;
    public function render($file, $data = [])
    {
        $viewFile = "Views/" . $this->folder . "/" . $file . ".php";
        extract($data);
        ob_start();
        include "Views/DantriParser/home.php";
        $view = ob_get_clean();
        require "Views/DantriParser/home.php";
    }
}
?>