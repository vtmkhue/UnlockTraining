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
function selectDataFromDB($query, $param): array
{
    $result = [];

    try {
        //Open connection
        $conn = openDBConnect();

        $stmt = $conn->prepare($query);
        if (count($param) > 0) {
            foreach ($param as $key => $value) {
                $stmt->bindParam(':' . $key, $value);
            }
        }
        $stmt->execute();

        //Get value
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();

        //Close connection
        closeDBConnect($conn);
    } catch (PDOException $e) {
        echo "Error when select data from Database: " . $e->getMessage();
    }

    return $result;
}

function insertDataToDB(): bool
{
    try {
        //Open connection
        $conn = openDBConnect();


        //Close connection
        closeDBConnect($conn);
    } catch (PDOException $e) {
        echo "Error when insert data to Database: " . $e->getMessage();
    }

    return true;
}

function updateDataFromDB(): bool
{
    try {
        //Open connection
        $conn = openDBConnect();


        //Close connection
        closeDBConnect($conn);
    } catch (PDOException $e) {
        echo "Error when update data from Database: " . $e->getMessage();
    }

    return true;
}

function deleteDataFromDB(): bool
{
    try {
        //Open connection
        $conn = openDBConnect();


        //Close connection
        closeDBConnect($conn);
    } catch (PDOException $e) {
        echo "Error while delete data from Database: " . $e->getMessage();
    }

    return true;
}
