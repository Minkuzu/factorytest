<?php

use App\Controllers\DantriParserController;
use App\Controllers\VnexpressParserController;
  function call($controller, $action) {
    require_once "Application/Controllers/" . $controller . "Controller.php";

    switch($controller) { // using switch doesn't scale well
      case "Pages":
        $controller = new PagesController();
      break;
      case "DantriParser":
        // we need the model to query the database later in the controller
        require_once "Application/Models/DantriParser.php";
        $controller = new DantriParserController();
      break;
      case "VnexpressParser":
        require_once "Application/Models/VnexpressParser.php";
        $controller = new VnexpressParserController();
      break;
    }

    $controller->$action();
  }
  // we're adding an entry for the new controller and its actions
  $controllers = array( 'Pages' => ['home', 'error'],
                        'DantriParser' => ['home'],
                        'VnexpressParser' => ['home']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
      echo "Call to function successfully";
    } else {
      call('pages', 'error');
      echo "something wrong";
    }
  } else {
    call('pages', 'error');
    echo "something wrong";
  }
?>