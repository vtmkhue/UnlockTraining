<?php

if (isset($_SESSION["loginUser"]) && isset($_COOKIE[$_SESSION["loginUser"]])) {
    header("Location: index.php?view=findnumber");
}

$errMessage = "";
$username = "";

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $errMessage = validatedUserName($username);
    if (!empty($errMessage)) {
        return;
    }

    $errMessage = validatedPassword($password);
    if (!empty($errMessage)) {
        return;
    }

    if (loginToPage($username, $password)) {
        header("Location: index.php?view=findnumber", TRUE, 301);
        exit();
    } else {
        $errMessage = "Login information is wrong.";
    }
}
