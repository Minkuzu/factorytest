<?php

use App\BaseController;

class PagesController {

  public function viewHome() {
      require_once __DIR__ . "/../Views/Pages/home.php";
  }

  public function viewError() {
    require_once __DIR__ . "/../Views/Pages/error.php";
  }
}
?>