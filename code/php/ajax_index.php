<?php

include "utils/functions.php";

const FIND_MAX_VALUE = 1;
const FIND_MIN_VALUE = 2;
const GET_POSITIVE_NUMBERS = 3;
const GET_NEGATIVE_NUMBERS = 4;

$strResult = "";

//Homework 1
if (isset($_POST["txtInputArray"])) {
    $inputArray = $_POST["txtInputArray"];
    $arrOption = $_POST["arrOption"];

    $strResult = validatedArrayInputValue($inputArray);
    if (!empty($strResult)) {
        goto endfunction;
    }

    switch ($arrOption) {
        case FIND_MAX_VALUE:
            $strResult = getMaxNumber($inputArray);
            break;
        case FIND_MIN_VALUE:
            $strResult = getMinNumber($inputArray);
            break;
        case GET_POSITIVE_NUMBERS:
            $strResult = getPositiveNumbers($inputArray);
            break;
        case GET_NEGATIVE_NUMBERS:
            $strResult = getNegativeNumbers($inputArray);
            break;
    }

    if (empty($strResult) && $strResult != "0") {
        $strResult = "No number found";
    } else {
        $strResult = "The result is: " . $strResult . ".";
    }

    goto endfunction;
}

//Homework 2
if (isset($_POST["saveCookie"])) {
    setcookie("savedCookie", $_POST["saveCookie"], time() + 300, '/');
    echo $_POST["saveCookie"];
} elseif (isset($_POST["getCookie"]) && $_POST["getCookie"] == "1") {
    $returnCookie = "";
    if (isset($_COOKIE["savedCookie"])) {
        $returnCookie = $_COOKIE["savedCookie"];
    }

    echo $returnCookie;
}

//Homework 3
if (isset($_POST["txtHeight"])) {
    $intHeight = $_POST["txtHeight"];
    $intWidth = $_POST["txtWidth"];

    $strResult = validatedRectangleSizeInputValue($intHeight);
    if (!empty($strResult)) {
        goto endfunction;
    }

    $strResult = validatedRectangleSizeInputValue($intWidth);
    if (!empty($strResult)) {
        goto endfunction;
    }

    $strResult = drawRectangleStar($intHeight, $intWidth);
}

endfunction:
echo $strResult;
