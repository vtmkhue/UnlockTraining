<?php

//include "utils/DrawRectangle.php";
//include "utils/FindNumber.php";
//
//const FIND_MAX_VALUE = 1;
//const FIND_MIN_VALUE = 2;
//const GET_POSITIVE_NUMBERS = 3;
//const GET_NEGATIVE_NUMBERS = 4;
//
//$showResult = "";
//
////Homework 1
//if (isset($_POST["arrayNumber"])) {
//    $arrayNumber = $_POST["arrayNumber"];
//    $findOption = $_POST["findOption"];
//
//    $showResult = validatedArrayInputValue($arrayNumber);
//    if (!empty($showResult)) {
//        goto endfunction;
//    }
//
//    switch ($findOption) {
//        case FIND_MAX_VALUE:
//            $showResult = getMaxNumber($arrayNumber);
//            break;
//        case FIND_MIN_VALUE:
//            $showResult = getMinNumber($arrayNumber);
//            break;
//        case GET_POSITIVE_NUMBERS:
//            $showResult = getPositiveNumbers($arrayNumber);
//            break;
//        case GET_NEGATIVE_NUMBERS:
//            $showResult = getNegativeNumbers($arrayNumber);
//            break;
//    }
//
//    if (empty($showResult) && $showResult != "0") {
//        $showResult = "No number found";
//    } else {
//        $showResult = "The result is: " . $showResult . ".";
//    }
//
//    goto endfunction;
//}
//
////Homework 2
//if (isset($_POST["saveCookie"])) {
//    setcookie("savedCookie", $_POST["saveCookie"], time() + 300, '/');
//    echo $_POST["saveCookie"];
//} elseif (isset($_POST["getCookie"]) && $_POST["getCookie"] == "1") {
//    $returnCookie = "";
//    if (isset($_COOKIE["savedCookie"])) {
//        $returnCookie = $_COOKIE["savedCookie"];
//    }
//
//    echo $returnCookie;
//}
//
////Homework 3
//if (isset($_POST["height"])) {
//    $height = $_POST["height"];
//    $width = $_POST["width"];
//
//    $showResult = validatedRectangleSizeInputValue($height);
//    if (!empty($showResult)) {
//        goto endfunction;
//    }
//
//    $showResult = validatedRectangleSizeInputValue($width);
//    if (!empty($showResult)) {
//        goto endfunction;
//    }
//
//    $showResult = drawRectangleStar($height, $width);
//}
//
//endfunction:
//echo $showResult;
