<?php

use App\Controllers\DantriParserController;
use App\Controllers\VnexpressParserController;

function call($controller, $action) {
  require_once "Application/Controllers/" . $controller . "Controller.php";
  switch ($controller) {
    case "Pages":
      $controller = new PagesController();
      break;
      case "DantriParser":
        // we need the model to query the database later in the controller
        $controller = new DantriParserController();
        break;
      case "VnexpressParser":
        $controller = new VnexpressParserController();
        break;
  }
  $controller->$action();
}

$url = $_POST['input'];

$path = parse_url($url, PHP_URL_PATH);
// we're adding an entry for the new controller and its actions
$controllers = array(   'Pages' => ['home', 'error'],
                        'DantriParser' => ['home'],
                        'VnexpressParser' => ['home']
                    );
if (empty($url) == false)  {
  require_once "Curl.php";
  if (str_contains($url, "dantri.com.vn") && array_search($path, $fixedCategories) == false) { // false means newspaper
    $controller = 'DantriParser';
    $action = 'home';
    call($controller, $action);
  } else if (str_contains($url , "vnexpress.net") && array_search($path, $categories) == false) {
    $controller = 'VnexpressParser';
    $action = 'home';
    call($controller, $action);
  } else {
    call('Pages','error');
    var_dump(array_search($path, $allCategories));
    echo "not redirected";
  }
} elseif (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
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