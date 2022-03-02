<?php

$urlImageName = "";
$displayImage = " style='display: none;' ";

//Save cookie when choosing option
if (isset($_POST["food"])) {
    $loginCookieSave = json_decode($_COOKIE[$_SESSION["loginUser"]], true);
    $loginCookieSave["choose"] = $_POST["food"];
    // $_COOKIE[$_SESSION["loginUser"]] = json_encode($loginCookieSave);

    setcookie($_SESSION["loginUser"], json_encode($loginCookieSave), strtotime('+30 days'));

    $urlImageName = $_POST["food"];
    $displayImage = "";
} elseif (isset($_SESSION["loginUser"]) && isset($_COOKIE[$_SESSION["loginUser"]])) {
    $loginCookieSave = json_decode($_COOKIE[$_SESSION["loginUser"]], true);

    if ($loginCookieSave["choose"] != "0") {
        $urlImageName = $loginCookieSave["choose"];
        $displayImage = "";
    }
}
