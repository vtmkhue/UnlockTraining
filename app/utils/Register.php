<?php

/**
 * @param string $fullname
 * @return string
 */
function validatedFullname(string $fullname): string
{
    if (empty($fullname) && $fullname != "0") {
        return "Full name cannot be empty.";
    }

    if (strlen($fullname) >= 50) {
        return "Your full name is too long.";
    }

    return "";
}

/**
 * @param string $birthday
 * @return string
 */
function validatedBirthday(string $birthday): string
{
    if (empty($birthday) && $birthday != "0") {
        return "";
    }

    $today = new DateTime();
    $birthday = new DateTime($birthday);
    $interval = $today->diff($birthday);

    if ($interval->y < 18 || $interval->y > 130) {
        return "Your birthday value is invalid.";
    }

    return "";
}

/**
 * @param string $gender
 * @return string
 */
function validatedGender(string $gender): string
{
    if (empty($gender)) {
        return "Gender cannot be empty.";
    }

    $genderlist = [1, 2, 3];
    if (!in_array($gender, $genderlist)) {
        return "Value of gender was wrong.";
    }

    return "";
}

/**
 * @param string $email
 * @return string
 */
function validatedEmail(string $email): string
{
    if (empty($email) && $email != "0") {
        return "";
    }

    if (strlen($email) >= 50) {
        return "Your email is too long.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Format of email is wrong.";
    }

    return "";
}

/**
 * @param string $phone
 * @return string
 */
function validatedPhoneNumber(string $phone): string
{
    if (strlen($phone) >= 20) {
        return "Phone number is too long.";
    }

    if (!empty($phone) && !ctype_digit($phone)) {
        return "Phone number can only consist of numbers.";
    }

    return "";
}

/**
 * @param string $username
 * @return string
 */
function validatedNewUsername(string $username): string
{
    if (empty($username) && $username != "0") {
        return "Username cannot be empty.";
    }

    if (strlen($username) >= 20) {
        return "Your username is too long.";
    }

    if (!ctype_alnum($username)) {
        return "Username can only consist of letters or numbers.";
    }

    if (isset($_COOKIE["bugCrash"]) && $_COOKIE["bugCrash"] == $username) {
        return "Username is already have.";
    } elseif (isUsernameExisted($username)) {
        setcookie("bugCrash", $username, strtotime('+30 days'));
        return "Username is already have.";
    }

    return "";
}

/**
 * @param string $password
 * @param string $repassword
 * @return string
 */
function validatedNewPassword(string $password, string $repassword): string
{
    if (empty($password) && $password != "0") {
        return "Password cannot be empty.";
    }

    if (strlen($password) > 20 || strlen($password) < 8) {
        return "Your password must be more than 8 and less than 20 characters.";
    }

    if (!ctype_alnum($password)) {
        return "Password can only consist of letters or numbers.";
    }

    if (empty($repassword) && $repassword != "0") {
        return "Please repeat your password to confirm.";
    }

    if ($password != $repassword) {
        return "Repeat password is different with password.";
    }

    return "";
}

/**
 * @param array<string> $paramAccount
 * @param array<string> $paramUser
 * @return bool
 */
function registerNewUser(array $paramAccount, array $paramUser): bool
{
    try {
        $accountModel = new AccountModel();
        $newAccountId = $accountModel->insertNewAccount([$paramAccount]);
        if (count($newAccountId) == 0) {
            return false;
        }

        array_push($paramUser, $newAccountId[0]);

        $userModel = new UserModel();
        $newUserId = $userModel->insertNewUser([$paramUser]);
        if (count($newUserId) == 0) {
            $newIDInsert = $newAccountId[0];
            $accountModel->deleteAccount([$newIDInsert]);
            return false;
        }
    } catch (Exception $e) {
        /* Write error to log ... */
        return false;
    }

    return true;
}
