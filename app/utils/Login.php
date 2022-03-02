<?php

function validatedUserName(string $username): string
{
    if (empty($username)) {
        return "Username cannot be empty.";
    }

    return "";
}

function validatedPassword(string $password): string
{
    if (empty($password)) {
        return "Password cannot be empty.";
    }

    return "";
}

/**
 * @param string $key
 * @param array<string> $paramValue
 * @return void
 */
function saveLoginCookie(string $key, array $paramValue): void
{
    if (isset($_COOKIE[$key])) {
        $_COOKIE[$key] = json_encode($paramValue);
    } else {
        setcookie($key, json_encode($paramValue), strtotime('+30 days'));
    }
}

function loginToPage(string $username, string $password): bool
{
    $accountModel = new AccountModel();
    $getLoginInfo = $accountModel->getAccountInfo($username, $password);
    if (count($getLoginInfo) == 0) {
        return false;
    }

    $userModel = new UserModel();
    $getNameOfUser = $userModel->getUserInfo($getLoginInfo[0]["account_id"]);
    if (count($getNameOfUser) == 0) {
        return false;
    }

    $_SESSION["loginUser"] = sha1($username);
    $saveInfoToCookie = [
        "account" => $getLoginInfo[0]["account_id"],
        "rule" => $getLoginInfo[0]["rule"],
        "name" => $getNameOfUser[0]["name"],
        "choose" => "0",
    ];
    // $saveInfoToCookie = [
    //     "account" => "1",
    //     "rule" => "3",
    //     "name" => "Khuê Võ",
    //     "choose" => "0",
    // ];
    saveLoginCookie($_SESSION["loginUser"], $saveInfoToCookie);

    return true;
}
