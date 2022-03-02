<?php

class UserModel extends ConnectDB
{
    /**
     * @param int $limitRow
     * @return array<string>
     */
    public function getAllUser(int $limitRow): array
    {
        $getUserList = [];

        try {
            $sql = "SELECT username, name, date_of_birth, email, tuser.account_id FROM tuser, taccount "
                . "WHERE tuser.account_id = taccount.account_id AND tuser.delete_flag = 0 AND taccount.delete_flag = 0 "
                . "ORDER BY user_id ASC"; // LIMIT :limit
            $param = array(
                // ':limit'  => $limitRow
            );

            $getUserList = $this->selectDataFromDB($sql, $param);
            // var_dump($limitRow);

            if (count($getUserList) == 0) {
                return $getUserList;
            }
        } catch (Exception $e) {
            /* Write error to log ... */
            return [];
        }

        return $getUserList;
    }

    /**
     * @param string $account
     * @return array<string>
     */
    public function getUserInfo(string $account): array
    {
        $getUserInfo = [];

        try {
            $sql = "SELECT name FROM tuser WHERE account_id = :account_id AND delete_flag = 0";
            $param = array(
                ':account_id'  => $account
            );

            $getUserInfo = $this->selectDataFromDB($sql, $param);
            if (count($getUserInfo) == 0) {
                return $getUserInfo;
            }
        } catch (Exception $e) {
            /* Write error to log ... */
            return [];
        }

        return $getUserInfo;
    }

    /**
     * @param array<array<string>> $param
     * @return array<string>
     */
    function insertNewUser(array $param): array
    {
        $newIDAfterInsert = [];

        try {
            $allInsertValue = [];
            foreach ($param as $row) {
                $addKey = [
                    ":name" => $row[0],
                    ":date_of_birth" => (empty($row[1]) ? null : $row[1]),
                    ":sex" => (empty($row[2]) ? null : $row[2]),
                    ":phone" => (empty($row[3]) ? null : $row[3]),
                    ":email" => (empty($row[4]) ? null : $row[4]),
                    ":account_id" => $row[5],
                ];

                array_push($allInsertValue, $addKey);
            }

            if (count($allInsertValue) <= 0) {
                return $newIDAfterInsert;
            }

            $newIDAfterInsert = $this->insertDataToDB("tuser", $allInsertValue);
        } catch (Exception $e) {
            /* Write error to log ... */
            return [];
        }

        return $newIDAfterInsert;
    }
}
