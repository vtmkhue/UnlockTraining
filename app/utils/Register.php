<?php
/**
 * @param string $fullname
 * @return string
 */
function validatedFullname(string $fullname): string
{
    $errMessage = "";

    if (empty($fullname) && $fullname != 0) {
        return "Full name cannot be empty.";
    }

    return $errMessage;
}

/**
 * @param string $birthday
 * @return string
 */
function validatedBirthday(string $birthday): string
{
    $errMessage = "";

    // if (empty($fullname)) {
    //     return "Full name cannot be empty.";
    // }

    return $errMessage;
}

/**
 * @param string $gender
 * @return string
 */
function validatedGender(string $gender): string
{
    $errMessage = "";

    if (empty($gender)) {
        return "Gender cannot be empty.";
    }

    $genderlist = [1, 2, 3];
    if (!in_array($gender, $genderlist)) {
        return "Value of gender was wrong.";
    }

    return $errMessage;
}

/**
 * @param array<string> $paramAccount
 * @param array<string> $paramUser
 * @return bool
 */
function registerNewUser(array $paramAccount, array $paramUser): bool
{
    $newAccountId = insertNewAccount([$paramAccount]);
    if ($newAccountId == 0) {
        return false;
    }

    array_push($paramUser, $newAccountId);

    $newUserId = insertNewUser([$paramUser]);
    if ($newUserId == 0) {
        return false;
    }

    return true;
}
