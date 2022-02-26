<?php

//include_once "../Model/TUser.php";
//include_once "../Model/TAccount.php";

function validatedUserName(string $username): string
{
    $errMessage = "";

    if (empty($username)) {
        return "Username cannot be empty.";
    }

    return $errMessage;
}

function validatedPassword(string $password): string
{
    $errMessage = "";

    if (empty($password)) {
        return "Password cannot be empty.";
    }

    return $errMessage;
}

function loginToPage(string $username, string $password): bool
{
    $getLoginInfo = getAccountInfo($username, $password);
    if (count($getLoginInfo) == 0) {
        return false;
    }

    $getNameOfUser = getUserInfo($getLoginInfo[0]["account_id"]);
    if (count($getNameOfUser) == 0) {
        return false;
    }

    setcookie("username", $username, time() + 300, '/');
    setcookie("account", $getLoginInfo[0]["account_id"], time() + 300, '/');
    setcookie("rule", $getLoginInfo[0]["rule"], time() + 300, '/');
    setcookie("name", $getNameOfUser[0]["name"], time() + 300, '/');
    setcookie("choose", "0", time() + 300, '/');

    return true;
}
