<?php
namespace App;
class BaseController
{
    public $folder;
    public function render($viewFile, $data = [])
    {
        // $viewFile = '../../Views/' . $this->folder . '/' . $file . '.php';
        // if(is_file($viewFile))
        // {
            
        // } 
        extract($data);
        include '../Application/Views/DantriParser/home.php';
    }
}
?>