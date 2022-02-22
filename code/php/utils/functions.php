<?php

function validatedArrayInputValue(string $arrNumber): string
{
    $errMessage = "";

    if (empty($arrNumber)) {
        return "The array cannot be empty.";
    }

    return $errMessage;
}

function validatedRectangleSizeInputValue(string $strSizeValue): string
{
    $errMessage = "";

    if (empty($strSizeValue) && $strSizeValue != "0") {
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

function getNumberOnly(string $strInput): bool
{
    return is_numeric($strInput);
}

function getMaxNumber(string $strArrayInput): string
{
    $strArrayInput = preg_replace('/\s+/', '', $strArrayInput);
    $arrGetArrayNumber = explode(",", $strArrayInput);
    $arrGetArrayNumber = array_filter($arrGetArrayNumber, "getNumberOnly");

    return max($arrGetArrayNumber);
}

function getMinNumber(string $strArrayInput): string
{
    $strArrayInput = preg_replace('/\s+/', '', $strArrayInput);
    $arrGetArrayNumber = explode(",", $strArrayInput);
    $arrGetArrayNumber = array_filter($arrGetArrayNumber, "getNumberOnly");

    return min($arrGetArrayNumber);
}

function getPositiveNumbers(string $strArrayInput): string
{
    $strArrayInput = preg_replace('/\s+/', '', $strArrayInput);
    $arrGetArrayNumber = explode(",", $strArrayInput);
    $arrGetArrayNumber = array_filter($arrGetArrayNumber, "getNumberOnly");
    $arrGetArrayNumber = array_filter($arrGetArrayNumber, function ($value) {
        return ($value > 0);
    });

    return implode(", ", $arrGetArrayNumber);
}

function getNegativeNumbers(string $strArrayInput): string
{
    $strArrayInput = preg_replace('/\s+/', '', $strArrayInput);
    $arrGetArrayNumber = explode(",", $strArrayInput);
    $arrGetArrayNumber = array_filter($arrGetArrayNumber, "getNumberOnly");
    $arrGetArrayNumber = array_filter($arrGetArrayNumber, function ($value) {
        return ($value < 0);
    });

    return implode(", ", $arrGetArrayNumber);
}

function drawRectangleStar(int $intHeight, int $intWidth): string
{
    $strStar = "*";
    $strLineWithFullStar = str_pad($strStar, $intWidth, "*");
    if ($intHeight == 1) {
        return $strLineWithFullStar;
    }

    $strLineWithMissStar = str_pad($strStar, ($intWidth - 1), " ");
    if ($intWidth != 1) {
        $strLineWithMissStar .= "*";
    }

    $strContent = $strLineWithMissStar;
    for ($i = 1; $i < ($intHeight - 2); $i++) {
        $strContent .= "<br/>" . $strLineWithMissStar;
    }

    return $strLineWithFullStar . "<br/>" . $strContent . "<br/>" . $strLineWithFullStar;
}
