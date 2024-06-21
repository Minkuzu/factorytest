<?php

use App\BaseController;

class PagesController{

  public function home() {
      require_once __DIR__ . "/../Views/Pages/home.php";
  }

  public function error() {
    require_once __DIR__ . "/../Views/Pages/error.php";
  }
  }
?>