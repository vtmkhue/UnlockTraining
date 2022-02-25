<?php

function openDBConnect(): PDO
{
    $dbhost = "db";
    $dbuser = "root";
    $dbpass = "password";
    $dbname = "testdb";

    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    try {
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}

function closeDBConnect(PDO $conn): void
{
    $conn = null;
}

/**
 * @param string $query
 * @param array<string> $param
 * @return array<string, string>
 */
function selectDataFromDB(string $query, array $param): array
{
    $result = [];

    try {
        //Open connection
        $conn = openDBConnect();
        $stmt = $conn->prepare($query);

        //Binding param - SQL Injection
        if (count($param) > 0) {
            foreach ($param as $key => &$value) {
                $stmt->bindParam($key, $value);
            }
        }

        //Execute SQL statement
        $isSuccess = $stmt->execute();
        if (!$isSuccess) {
            return [];
        }

        //Get value
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        //Close connection
        closeDBConnect($conn);
    } catch (PDOException $e) {
        echo "Error when select data from Database: " . $e->getMessage();
    }

    return $result;
}

/**
 * @param string $table
 * @param array<array<string>> $param
 * @return integer
 */
function insertDataToDB(string $table, array $param = [[]]): int
{
    $newIDAfterInsert = 0;

    try {
        //Open connection
        $conn = openDBConnect();

        $bindfield = implode(', ', array_keys($param[0]));
        $field = str_replace(":", "", $bindfield);

        $sql = "INSERT INTO $table($field) VALUES($bindfield)";
        $stmt = $conn->prepare($sql);

        foreach ($param as $row) {
            $stmt->execute($row);
        }

        $newIDAfterInsert = $conn->lastInsertId();

        //Close connection
        closeDBConnect($conn);
    } catch (PDOException $e) {
        echo "Error when insert data to Database: " . $e->getMessage();
        $newIDAfterInsert = 0;
    }

    return $newIDAfterInsert;
}

/**
 * @param string $table
 * @param array<string> $key
 * @param array<string> $param
 * @return bool
 */
function updateDataFromDB(string $table, array $key, array $param): bool
{
    $isSuccess = true;

    try {
        //Open connection
        $conn = openDBConnect();

        $keylist = [];
        foreach ($key as $k => $v) {
            $removeColon = str_replace(":", "", $k);
            $makePair = $removeColon . "=" . $k;
            array_push($keylist, $makePair);
        }
        $condition = implode(', ', $keylist);

        $valuelist = [];
        foreach ($param as $k => $v) {
            $removeColon = str_replace(":", "", $k);
            $makePair = $removeColon . "=" . $k;
            array_push($valuelist, $makePair);
        }
        $value = implode(', ', $valuelist);

        $sql = "UPDATE $table SET $value WHERE $condition";
        $stmt = $conn->prepare($sql);

        foreach ($key as $k => &$v) {
            $stmt->bindParam($k, $v);
        }

        foreach ($param as $k => &$v) {
            $stmt->bindParam($k, $v);
        }

        $isSuccess = $stmt->execute();

        //Close connection
        closeDBConnect($conn);
    } catch (PDOException $e) {
        echo "Error when update data from Database: " . $e->getMessage();
        $isSuccess = false;
    }

    return $isSuccess;
}

/**
 * @param string $table
 * @param array<string> $key
 * @return bool
 */
function deleteDataFromDB(string $table, array $key): bool
{
    $isSuccess = true;

    try {
        //Open connection
        $conn = openDBConnect();

        $keylist = [];
        foreach ($key as $k => $v) {
            $removeColon = str_replace(":", "", $k);
            $makePair = $removeColon . "=" . $k;
            array_push($keylist, $makePair);
        }
        $condition = implode(', ', $keylist);

        // construct the delete statement
        $sql = "DELETE FROM $table WHERE $condition";
        // prepare the statement for execution
        $stmt = $conn->prepare($sql);

        foreach ($key as $k => &$v) {
            $stmt->bindParam($k, $v);
        }

        $isSuccess = $stmt->execute();

        //Close connection
        closeDBConnect($conn);
    } catch (PDOException $e) {
        echo "Error while delete data from Database: " . $e->getMessage();
        $isSuccess = false ;
    }

    return $isSuccess;
}
