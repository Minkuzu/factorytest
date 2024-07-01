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
        // need the model to query the database later in the controller
        $controller = new DantriParserController();
        break;
      case "VnexpressParser":
        $controller = new VnexpressParserController();
        break;
  }
  //  Call the function of destinated controller
  $controller->$action();
}

$url = $_POST['input'];

$path = parse_url($url, PHP_URL_PATH);
// adding an entry for the new controller and its actions
$controllers = array(   'Pages' => ['viewHome', 'viewError'],
                        'DantriParser' => ['viewHome'],
                        'VnexpressParser' => ['viewHome']
                    );
if (empty($url) == false)  {
  require_once "Curl.php";
//  If url contains dantri.com.vn and path not included
  if (str_contains($url, "dantri.com.vn") && array_search($path, $DanTriCategories) == false) { // false means newspaper
    $controller = 'DantriParser';
    $action = 'viewHome';
    call($controller, $action);
//  If url contains vnexpress.net and path not included
  } else if (str_contains($url , "vnexpress.net") && array_search($path, $allCategories) == false) {
    $controller = 'VnexpressParser';
    $action = 'viewHome';
    call($controller, $action);
//  Call to error page
  } else {
    call('Pages','viewError');
    echo "not redirected";
  }
} elseif (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
    echo "Call to function successfully";
  } else {
    call('Pages', 'viewError');
    echo "something wrong";
  }
} else {
  call('Pages', 'viewError');
  echo "something wrong";
}
?>