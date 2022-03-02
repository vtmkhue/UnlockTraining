<?php

class AccountModel extends ConnectDB
{
    /**
     * @param string $username
     * @return bool
     */
    function isUsernameExisted(string $username): bool
    {
        try {
            $sql = "SELECT rule FROM taccount WHERE username = :username";
            $param = array(
                ':username'  => $username
            );

            $getAccountInfo = $this->selectDataFromDB($sql, $param);
            if (count($getAccountInfo) == 0) {
                return false;
            }
        } catch (Exception $e) {
            /* Write error to log ... */
        }

        return true;
    }

    /**
     * @param string $username
     * @param string $password
     * @return array<string>
     */
    function getAccountInfo(string $username, string $password): array
    {
        $getAccountInfo = [];

        try {
            $sql = "SELECT account_id, rule FROM taccount WHERE username = :username AND password = :password AND delete_flag = 0";
            $param = array(
                ':username' => $username,
                ':password' => sha1($password),
            );

            $getAccountInfo = $this->selectDataFromDB($sql, $param);
            if (count($getAccountInfo) == 0) {
                return $getAccountInfo;
            }
        } catch (Exception $e) {
            /* Write error to log ... */
            return [];
        }

        return $getAccountInfo;
    }

    /**
     * @param array<array<string>> $param
     * @return array<string>
     */
    function insertNewAccount(array $param): array
    {
        $newIDAfterInsert = [];

        try {
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

            $newIDAfterInsert = $this->insertDataToDB("taccount", $allInsertValue);
        } catch (Exception $e) {
            /* Write error to log ... */
            return [];
        }

        return $newIDAfterInsert;
    }

    /**
     * @param array<string> $paramKey
     * @return bool
     */
    function deleteAccount(array $paramKey): bool
    {
        $isDelete = false;

        try {
            if (count($paramKey) <= 0) {
                return $isDelete;
            }

            $conditionKeyToDelete = [
                ":account_id" => $paramKey[0],
            ];

            $isDelete = $this->deleteDataFromDB("taccount", $conditionKeyToDelete);
        } catch (Exception $e) {
            /* Write error to log ... */
        }

        return $isDelete;
    }
}
