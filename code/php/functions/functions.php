<?php

function validatedArrayInputValue(string $arrNumber): string
{
    $errMessage = "";

    if (empty($arrNumber)) {
        $errMessage = "The array cannot be empty.";
        goto endfunction;
    }

    endfunction:
    return $errMessage;
}

function validatedRectangleSizeInputValue(string $strSizeValue): string
{
    $errMessage = "";

    if (empty($strSizeValue)) {
        $errMessage = "The rectangle size cannot be empty.";
        goto endfunction;
    }

    if (!is_numeric($strSizeValue)) {
        $errMessage = "The rectangle size must be a number.";
        goto endfunction;
    }

    if (str_contains($strSizeValue, ".")) {
        $errMessage = "The rectangle size must be a integer number.";
        goto endfunction;
    }

    if ($strSizeValue <= 0) {
        $errMessage = "The rectangle size must be a positive integer number.";
        goto endfunction;
    }

    endfunction:
    return $errMessage;
}

function getMaxNumber(string $strArrayInput): string
{
    $strArrayInput = preg_replace('/\s+/', '', $strArrayInput);
    $arrGetArrayNumber = explode(",", $strArrayInput);
    rsort($arrGetArrayNumber);

    $maxNumber = "";

    for ($i = 0; $i < count($arrGetArrayNumber); $i++) {
        if (!empty($maxNumber) || $maxNumber == "0") {
            break;
        }

        if (!is_numeric($arrGetArrayNumber[$i])) {
            continue;
        }

        $maxNumber = $arrGetArrayNumber[$i];
    }

    return $maxNumber;
}

function getMinNumber(string $strArrayInput): string
{
    $strArrayInput = preg_replace('/\s+/', '', $strArrayInput);
    $arrGetArrayNumber = explode(",", $strArrayInput);
    sort($arrGetArrayNumber);

    $minNumber = "";

    for ($i = 0; $i < count($arrGetArrayNumber); $i++) {
        if (!empty($minNumber) || $minNumber == "0") {
            break;
        }

        if (!is_numeric($arrGetArrayNumber[$i])) {
            continue;
        }

        $minNumber = $arrGetArrayNumber[$i];
    }

    return $minNumber;
}

function getPositiveNumbers(string $strArrayInput): string
{
    $strArrayInput = preg_replace('/\s+/', '', $strArrayInput);
    $arrGetArrayNumber = explode(",", $strArrayInput);
    rsort($arrGetArrayNumber);

    $strPositiveNumber = "";

    for ($i = 0; $i < count($arrGetArrayNumber); $i++) {
        if (!is_numeric($arrGetArrayNumber[$i])) {
            continue;
        }

        if ($arrGetArrayNumber[$i] <= 0) {
            break;
        }

        $strPositiveNumber .= $arrGetArrayNumber[$i] . ", ";
    }

    return $strPositiveNumber;
}

function getNegativeNumbers(string $strArrayInput): string
{
    $strArrayInput = preg_replace('/\s+/', '', $strArrayInput);
    $arrGetArrayNumber = explode(",", $strArrayInput);
    sort($arrGetArrayNumber);

    $strNegativeNumber = "";

    for ($i = 0; $i < count($arrGetArrayNumber); $i++) {
        if (!is_numeric($arrGetArrayNumber[$i])) {
            continue;
        }

        if (0 <= $arrGetArrayNumber[$i]) {
            break;
        }

        $strNegativeNumber .= $arrGetArrayNumber[$i] . ", ";
    }

    return $strNegativeNumber;
}

function drawRectangleStar(int $intHeight, int $intWidth): string
{
    $strStar = "*";
    $strLineWithFullStar = str_pad($strStar, $intWidth, "*");
    $strLineWithMissStar = str_pad($strStar, ($intWidth - 1), " ");
    $strLineWithMissStar .= "*";

    $strContent = $strLineWithMissStar;
    for ($i = 1; $i < ($intHeight - 2); $i++) {
        $strContent .= "<br/>" . $strLineWithMissStar;
    }

    return $strLineWithFullStar . "<br/>" . $strContent . "<br/>" . $strLineWithFullStar;
}
