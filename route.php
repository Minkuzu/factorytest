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

$url = $_POST['input'];
var_dump(empty($url));
// we're adding an entry for the new controller and its actions
$controllers = array(   'Pages' => ['home', 'error'],
                        'DantriParser' => ['home'],
                        'VnexpressParser' => ['home']
                    );
if(empty($url) == false)  {
  if(str_contains($url, "dantri.com.vn")) {
    $controller = 'DantriParser';
    $action = 'home';
    call($controller, $action);
  } else if(str_contains($url , "vnexpress.net")) {
    $controller = 'VnexpressParser';
    $action = 'home';
    call($controller, $action);
  } else {
    call('Pages','error');
  }
} else if(array_key_exists($controller, $controllers))  {
  if (in_array($action, $controllers[$controller])) 
  {
    call($controller, $action);
    echo "Call to function successfully";
  } else {
    call('Pages', 'error');
    echo "something wrong";
  }
} else {
  call('Pages', 'error');
  echo "something wrong";
}
?>