<?php

/**
 * @param string $username
 * @param string $password
 * @return array<string>
 */
function getAccountInfo(string $username, string $password): array
{
    $sql = "SELECT account_id, rule FROM taccount WHERE username = :username AND password = :password AND delete_flag = 0";
    $param = array(
        ':username'  => $username,
        ':password' => sha1($password),
    );

    $getAccountInfo = selectDataFromDB($sql, $param);
    if (count($getAccountInfo) == 0) {
        return [];
    }

    return $getAccountInfo;
}

/**
 * @param array<array<string>> $param
 * @return integer
 */
function insertNewAccount(array $param): int
{
    $newIDAfterInsert = 0;
    $allInsertValue = [];

    foreach ($param as $row) {
        $addKey = [
            ":username" => $row[0],
            ":password" => $row[1],
            ":rule" => $row[2],
        ];

        array_push($allInsertValue, $addKey);
    }

    if (count($allInsertValue) <= 0) {
        return $newIDAfterInsert;
    }

    $newIDAfterInsert = insertDataToDB("taccount", $allInsertValue);
    return $newIDAfterInsert;
}
