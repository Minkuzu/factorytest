<?php
namespace App;
class BaseController
{
    protected $folder;
    
    public function render($file, $data = []) {
        $viewFile = "Views/" . $this->folder . "/" . $file . ".php"; //  Views/whicheverControllerCalls/viewfile.php

        extract($data);  

        include $viewFile;
    }
}
?>