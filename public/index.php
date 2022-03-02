<?php 
session_start(); 

// require __DIR__ . "/bootstrap/app.php";
include_once "../bootstrap/app.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

parse_str($_SERVER['QUERY_STRING'], $query);

// var_dump($uri);
// var_dump($_SERVER['REQUEST_URI']);
// var_dump($_SERVER["REQUEST_METHOD"]);
// var_dump($_SERVER["QUERY_STRING"]);
// var_dump($query);

$mainPageList = ["login", "register", "main", "users", "api-users"];

if (empty($uri[1]) && $uri[1] != "0") {
    include_once "../app/Controllers/HandleLogin.php";
    include_once "../resources/views/login.php";

} else if (!in_array($uri[1], $mainPageList) 
    || (isset($uri[2]) && $uri[1] != "users")
    || count($uri) > 3) {
    include_once "../resources/views/page_not_found.php";

} else {

    if ($uri[1] == "login") {
        //Logout and clear session
        if (isset($query["logout"]) && $query["logout"] == "1") {
            unset($_SESSION["loginUser"]);
        }

        include_once "../app/Controllers/HandleLogin.php";
        include_once "../resources/views/login.php";
        
    } else if ($uri[1] == "register") {
        include_once "../app/Controllers/HandleRegister.php";
        include_once "../resources/views/register.php";

    } else if ($uri[1] == "main") {
        $viewOfMainPage = ["findnumber", "savecookie", "drawrectangle"];
        if (count($query) == 0 
            || !isset($query["view"]) 
            || !in_array($query["view"], $viewOfMainPage)) {
            include_once "../resources/views/page_not_found.php";

        } else {
            switch ($query["view"]) {
                case "findnumber": //Find number
                    include_once "../app/Controllers/HandleFindNumber.php";
                    include_once "../resources/views/header.php";
                    include_once "../resources/views/find_number.php";
                    include_once "../resources/views/footer.php";
                    break;
                case "savecookie": //Save cookie
                    include_once "../app/Controllers/HandleSaveCookie.php";
                    include_once "../resources/views/header.php";
                    include_once "../resources/views/save_cookie.php";
                    include_once "../resources/views/footer.php";
                    break;
                case "drawrectangle": //Draw rectangle star
                    include_once "../app/Controllers/HandleRawRectangle.php";
                    include_once "../resources/views/header.php";
                    include_once "../resources/views/draw_rectangle_star.php";
                    include_once "../resources/views/footer.php";
                    break;
                default: //Default is not found page
                    include_once "../resources/views/page_not_found.php";
                    break;
            }
        }

    } else if ($uri[1] == "users" || $uri[1] == "api-users") {
        $objUserController = new UserController();
        
        if ($uri[1] == "api-users") {
            $strMethodName = 'getAPIListOfUser';
            if (isset($uri[2])) {
                //Write method get user by ID (for example)
                $strMethodName = 'Another method';
            }
            $objUserController->{$strMethodName}();
            
        } else if ($uri[1] == "users") {
            $listUser = $objUserController->getListOfUser();

            include_once "../app/Controllers/HandleUserInfo.php";
            include_once "../resources/views/header.php";
            include_once "../resources/views/user_manage.php";
            include_once "../resources/views/footer.php";
        }
        
    } else {
        include_once "../resources/views/page_not_found.php";
    }
}
