<?php
namespace App;
class BaseController
{
    public $folder;
    public function render($file, $data = [])
    {
        $viewFile = "Views/" . $this->folder . "/" . $file . ".php"; //Views/whicheverControllerCalls/viewfile.php
        extract($data);
        echo "abc";
        ob_start();
        require_once $viewFile;
        $view = ob_get_clean();
        require_once "Views/Layouts/Application.php";
    }
}
?>