<?php

const FIND_MAX_VALUE = 1;
const FIND_MIN_VALUE = 2;
const GET_POSITIVE_NUMBERS = 3;
const GET_NEGATIVE_NUMBERS = 4;

$arrayNumber = "";
$findOption = "1";

$showResult = "";

//Find number (max, min, positive, negative)
if (isset($_POST["arrayNumber"])) {
    $arrayNumber = $_POST["arrayNumber"];
    $findOption = $_POST["findOption"];

    $showResult = validatedArrayInputValue($arrayNumber);
    if (!empty($showResult)) {
        return;
    }

    switch ($findOption) {
        case FIND_MAX_VALUE:
            $showResult = getMaxNumber($arrayNumber);
            break;
        case FIND_MIN_VALUE:
            $showResult = getMinNumber($arrayNumber);
            break;
        case GET_POSITIVE_NUMBERS:
            $showResult = getPositiveNumbers($arrayNumber);
            break;
        case GET_NEGATIVE_NUMBERS:
            $showResult = getNegativeNumbers($arrayNumber);
            break;
    }

    if (empty($showResult) && $showResult != "0") {
        $showResult = "No number found.";
    } else {
        $showResult = "The result is: " . $showResult . ".";
    }
}
