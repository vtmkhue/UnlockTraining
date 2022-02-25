<?php

//include_once "../utils/ConnectDB.php";

/**
 * @param string $account
 * @return array<string>
 */
function getUserInfo(string $account): array
{
    $sql = "SELECT name FROM tuser WHERE account_id = :account_id AND delete_flag = 0";
    $param = array(
        ':account_id'  => $account
    );

    $getUserInfo = selectDataFromDB($sql, $param);
    if (count($getUserInfo) == 0) {
        return [];
    }

    return $getUserInfo;
}

/**
 * @param array<array<string>> $param
 * @return integer
 */
function insertNewUser(array $param): int
{
    $newIDAfterInsert = 0;
    $allInsertValue = [];

    foreach ($param as $row) {
        $addKey = [
            ":name" => $row[0],
            ":date_of_birth" => $row[1],
            ":sex" => $row[2],
            ":phone" => $row[3],
            ":email" => $row[4],
            ":account_id" => $row[5],
        ];

        array_push($allInsertValue, $addKey);
    }

    if (count($allInsertValue) <= 0) {
        return $newIDAfterInsert;
    }

    $newIDAfterInsert = insertDataToDB("tuser", $allInsertValue);
    return $newIDAfterInsert;
}
