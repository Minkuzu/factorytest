<?php
namespace App;
class BaseController
{
    public $folder;
    public function render($file, $data = [])
    {
        $viewFile = "Views/" . $this->folder . "/" . $file . ".php"; //Views/whicheverControllerCalls/viewfile.php

        extract($data);
        
        include $viewFile;
        
    }
}
?>