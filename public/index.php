<?php 
session_start(); 

include_once "../bootstrap/app.php";

//Logout and clear session
if (isset($_GET["logout"]) && $_GET["logout"] == "1") {
    unset($_SESSION["loginUser"]);
}

$pagelist = ["login", "register", "findnumber", "savecookie", "drawrectangle"];
if (!isset($_GET["view"]) || !in_array($_GET["view"], $pagelist)) {
    include_once "../app/Controllers/HandleLogin.php";
    include_once "../resources/views/login.php";
} else {
    switch ($_GET["view"]) {
        case "login": //Login
            include_once "../app/Controllers/HandleLogin.php";
            include_once "../resources/views/login.php";
            break;
        case "register": //Register
            include_once "../app/Controllers/HandleRegister.php";
            include_once "../resources/views/register.php";
            break;
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
        default: //Default is login
            include_once "../app/Controllers/HandleLogin.php";
            include_once "../resources/views/login.php";
            break;
    }
}
