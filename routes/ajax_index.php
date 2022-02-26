<?php

include_once "../bootstrap/app.php";

//Login
if (isset($_POST["username"])) {
    $showResult = "";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $showResult = validatedUserName($username);
    if (!empty($showResult)) {
        goto endfunction;
    }

    $showResult = validatedPassword($password);
    if (!empty($showResult)) {
        goto endfunction;
    }

    if (loginToPage($username, $password)) {
        $showResult = "success";
    } else {
        $showResult = "Login information is wrong.";
    }

    endfunction:
    echo $showResult;
}

//Register
if (isset($_POST["name"])) {
    $insertResult = array();

    $name = $_POST["name"];
    $birthdayDate = $_POST["birthdayDate"];
    if (!empty($birthdayDate)) {
        $birthdayDate = date("Y-m-d", strtotime(str_replace('/', '-', $birthdayDate)));
    }
    $gender = $_POST["gender"];
    $emailAddress = $_POST["emailAddress"];
    $phoneNumber = $_POST["phoneNumber"];
    $username = $_POST["newusername"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    //Validate all input value
    $isError = false;
    $errorInputMessage = validatedFullname($name);
    array_push($insertResult, $errorInputMessage);
    if (!empty($errorInputMessage)) {
        $isError = true;
    }
    
    $errorInputMessage = validatedBirthday($birthdayDate);
    array_push($insertResult, $errorInputMessage);
    if (!empty($errorInputMessage)) {
        $isError = true;
    }

    $errorInputMessage = validatedGender($gender);
    array_push($insertResult, $errorInputMessage);
    if (!empty($errorInputMessage)) {
        $isError = true;
    }

    $errorInputMessage = validatedEmail($emailAddress);
    array_push($insertResult, $errorInputMessage);
    if (!empty($errorInputMessage)) {
        $isError = true;
    }

    $errorInputMessage = validatedPhoneNumber($phoneNumber);
    array_push($insertResult, $errorInputMessage);
    if (!empty($errorInputMessage)) {
        $isError = true;
    }

    $errorInputMessage = validatedNewUsername($username);
    array_push($insertResult, $errorInputMessage);
    if (!empty($errorInputMessage)) {
        $isError = true;
    }

    $errorInputMessage = validatedNewPassword($password, $repassword);
    array_push($insertResult, $errorInputMessage);
    if (!empty($errorInputMessage)) {
        $isError = true;
    }

    //No error input found
    if (!$isError) {
        // unset($insertResult);
        // $insertResult = array();

        $paramAccount = array();
        array_push($paramAccount, strtolower($username));
        array_push($paramAccount, sha1($password));
        array_push($paramAccount, "3");

        $paramUser = array();
        array_push($paramUser, $name);
        array_push($paramUser, $birthdayDate);
        array_push($paramUser, $gender);
        array_push($paramUser, $phoneNumber);
        array_push($paramUser, $emailAddress);

        if (!registerNewUser($paramAccount, $paramUser)) {
            echo json_encode([0 => "Cannot create your account."]);
            // array_push($insertResult, "Cannot create your account.");
        }
    }

    echo json_encode($insertResult);
}
