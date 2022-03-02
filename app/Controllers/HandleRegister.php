<?php

$fullname = "";
$birthdayDate = "";
$gender = "1";
$emailAddress = "";
$phoneNumber = "";
$username = "";

$errName = "";
$errBirthday = "";
$errGender = "";
$errEmail = "";
$errPhone = "";
$errUsername = "";
$errPass = "";
$errInsertUser = "";
$successInsert = false;

//Register
if (isset($_POST["name"])) {
    //Get value from Form
    $fullname = $_POST["name"];
    $birthdayDate = $_POST["birthdayDate"];
    $convertFormatBOD = "";
    if (!empty($birthdayDate)) {
        $convertFormatBOD = date("Y-m-d", strtotime(str_replace('/', '-', $birthdayDate)));
    }
    $gender = $_POST["gender"];
    $emailAddress = $_POST["emailAddress"];
    $phoneNumber = $_POST["phoneNumber"];
    $username = $_POST["newusername"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    //Validate all input value
    $isError = false;

    $errName = validatedFullname($fullname);
    if (!empty($errName)) {
        $isError = true;
    }

    $errBirthday = validatedBirthday($convertFormatBOD);
    if (!empty($errBirthday)) {
        $isError = true;
    }

    $errGender = validatedGender($gender);
    if (!empty($errGender)) {
        $isError = true;
    }

    $errEmail = validatedEmail($emailAddress);
    if (!empty($errEmail)) {
        $isError = true;
    }

    $errPhone = validatedPhoneNumber($phoneNumber);
    if (!empty($errPhone)) {
        $isError = true;
    }

    $errUsername = validatedNewUsername($username);
    if (!empty($errUsername)) {
        $isError = true;
    }

    $errPass = validatedNewPassword($password, $repassword);
    if (!empty($errPass)) {
        $isError = true;
    }

    //No error input found
    if (!$isError) {
        $paramAccount = array();
        array_push($paramAccount, strtolower($username));
        array_push($paramAccount, sha1($password));
        array_push($paramAccount, "3");

        $paramUser = array();
        array_push($paramUser, $fullname);
        array_push($paramUser, $convertFormatBOD);
        array_push($paramUser, $gender);
        array_push($paramUser, $phoneNumber);
        array_push($paramUser, $emailAddress);

        if (!registerNewUser($paramAccount, $paramUser)) {
            $errInsertUser = "Cannot create your account.";
        } else {
            $successInsert = true;
        }
    }
}
