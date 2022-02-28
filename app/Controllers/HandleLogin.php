<?php

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
        header("Location: index.php?view=fn", TRUE, 301);
        exit();
    } else {
        $errMessage = "Login information is wrong.";
    }
}
