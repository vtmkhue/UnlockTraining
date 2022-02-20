<?php

include "functions/functions.php";

const FIND_MAX_VALUE = 1;
const FIND_MIN_VALUE = 2;
const GET_POSITIVE_NUMBERS = 3;
const GET_NEGATIVE_NUMBERS = 4;

$strResult = "";

//Homework 1 + add value of this homework to Cookie for Homework 2
if (isset($_POST["txtInputArray"])) {
    setcookie("arrNumber", $_POST["txtInputArray"], time() + 300, '/');
    setcookie("intFindOption", $_POST["arrOption"], time() + 300, '/');

    $strResult = validatedArrayInputValue($_POST["txtInputArray"]);
    if (!empty($strResult)) {
        goto endfunction;
    }

    switch ($_POST["arrOption"]) {
        case FIND_MAX_VALUE:
            $strResult = getMaxNumber($_POST["txtInputArray"]);
            break;
        case FIND_MIN_VALUE:
            $strResult = getMinNumber($_POST["txtInputArray"]);
            break;
        case GET_POSITIVE_NUMBERS:
            $strResult = getPositiveNumbers($_POST["txtInputArray"]);
            break;
        case GET_NEGATIVE_NUMBERS:
            $strResult = getNegativeNumbers($_POST["txtInputArray"]);
            break;
    }

    if (empty($strResult) && $strResult != "0") {
        $strResult = "No number found";
    } else {
        if (strpos($strResult, ",")) {
            $strResult = substr($strResult, 0, strlen($strResult) - 2);
        }
        $strResult = "The result is: " . $strResult . ".";
    }

    goto endfunction;
}

//Homework 2
if (isset($_POST["getCookie"]) && $_POST["getCookie"] == "1") {
    if (isset($_COOKIE["arrNumber"])) {
        $returnCookie = [];
        $returnCookie[0] = $_COOKIE["arrNumber"];
        $returnCookie[1] = $_COOKIE["intFindOption"];

        echo json_encode($returnCookie);
    }
}

//Homework 3
if (isset($_POST["txtHeight"])) {
    $strResult = validatedRectangleSizeInputValue($_POST["txtHeight"]);
    if (!empty($strResult)) {
        goto endfunction;
    }

    $strResult = validatedRectangleSizeInputValue($_POST["txtWidth"]);
    if (!empty($strResult)) {
        goto endfunction;
    }

    $strResult = drawRectangleStar($_POST["txtHeight"], $_POST["txtWidth"]);
}


endfunction:
echo $strResult;
