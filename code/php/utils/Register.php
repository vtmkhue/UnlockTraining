<?php

function validatedFullname(string $fullname): string
{
    $errMessage = "";

    if (empty($fullname)) {
        return "Full name cannot be empty.";
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
