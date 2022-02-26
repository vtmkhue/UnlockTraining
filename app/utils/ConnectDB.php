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
        /* Write error to log ... */
        echo "Connection failed: " . $e->getMessage();
        $conn = null;
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
        if ($stmt->execute()) {
            //Get value
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
    } catch (PDOException $e) {
        /* Write error to log ... */
        echo "Error when select data from Database: " . $e->getMessage();
        //Reset array
        unset($result);
        $result = [];
    } finally {
        //Close connection
        closeDBConnect($conn);
    }

    return $result;
}

/**
 * @param string $table
 * @param array<array<string>> $param
 * @return array<int>
 */
function insertDataToDB(string $table, array $param = [[]]): array
{
    $newIDAfterInsert = [];

    try {
        //Open connection
        $conn = openDBConnect();

        $bindfield = implode(', ', array_keys($param[0]));
        $field = str_replace(":", "", $bindfield);

        $sql = "INSERT INTO $table($field) VALUES($bindfield)";
        $stmt = $conn->prepare($sql);

        foreach ($param as $row) {
            $stmt->execute($row);
            array_push($newIDAfterInsert, $conn->lastInsertId());
        }
    } catch (PDOException $e) {
        /* Write error to log ... */
        echo "Error when insert data to Database: " . $e->getMessage();
        //Reset array
        unset($newIDAfterInsert);
        $newIDAfterInsert = [];
    } finally {
        //Close connection
        closeDBConnect($conn);
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
    $isSuccess = false;

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
    } catch (PDOException $e) {
        /* Write error to log ... */
        echo "Error when update data from Database: " . $e->getMessage();
    } finally {
        //Close connection
        closeDBConnect($conn);
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
    $isSuccess = false;

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
    } catch (PDOException $e) {
        /* Write error to log ... */
        echo "Error while delete data from Database: " . $e->getMessage();
    } finally {
        //Close connection
        closeDBConnect($conn);
    }

    return $isSuccess;
}
