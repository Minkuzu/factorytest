<?php
class BaseController
{
    public $folder;
    public function render($file, $data = array())
    {
        $viewFile = '../../Views/' . $this->folder . '/' . $file . '.php';
        if(is_file($viewFile))
        {
            extract($data);
            require_once($viewFile);
        } 

    }
}
?>