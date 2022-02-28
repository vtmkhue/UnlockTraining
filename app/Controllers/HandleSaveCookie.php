<?php

$imageLoad = "";
$showImage = " style='display: none;' ";

//Save cookie when choosing option
if (isset($_POST["food"])) {
    $loginCookieSave = json_decode($_COOKIE[$_SESSION["loginUser"]], true);
    $loginCookieSave["choose"] = $_POST["food"];
    // $_COOKIE[$_SESSION["loginUser"]] = json_encode($loginCookieSave);

    setcookie($_SESSION["loginUser"], json_encode($loginCookieSave), strtotime('+30 days'));

    $imageLoad = $_POST["food"];
    $showImage = "";

} else if (isset($_SESSION["loginUser"]) && isset($_COOKIE[$_SESSION["loginUser"]])) {
    $loginCookieSave = json_decode($_COOKIE[$_SESSION["loginUser"]], true);

    if ($loginCookieSave["choose"] != "0") {
        $imageLoad = $loginCookieSave["choose"];
        $showImage = "";
    }
}
