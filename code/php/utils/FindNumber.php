<?php

function validatedArrayInputValue(string $arrayNumber): string
{
    $errMessage = "";

    if (empty($arrayNumber)) {
        return "The array cannot be empty.";
    }

    return $errMessage;
}

function getNumberOnly(string $value): bool
{
    return is_numeric($value);
}

function getMaxNumber(string $stringOfNumber): string
{
    $stringOfNumber = preg_replace('/\s+/', '', $stringOfNumber);
    $arrayNumber = explode(",", $stringOfNumber);
    $arrayNumber = array_filter($arrayNumber, "getNumberOnly");

    return max($arrayNumber);
}

function getMinNumber(string $stringOfNumber): string
{
    $stringOfNumber = preg_replace('/\s+/', '', $stringOfNumber);
    $arrayNumber = explode(",", $stringOfNumber);
    $arrayNumber = array_filter($arrayNumber, "getNumberOnly");

    return min($arrayNumber);
}

function getPositiveNumbers(string $stringOfNumber): string
{
    $stringOfNumber = preg_replace('/\s+/', '', $stringOfNumber);
    $arrayNumber = explode(",", $stringOfNumber);
    $arrayNumber = array_filter($arrayNumber, "getNumberOnly");
    $arrayNumber = array_filter($arrayNumber, function ($value) {
        return ($value > 0);
    });

    return implode(", ", $arrayNumber);
}

function getNegativeNumbers(string $stringOfNumber): string
{
    $stringOfNumber = preg_replace('/\s+/', '', $stringOfNumber);
    $arrayNumber = explode(",", $stringOfNumber);
    $arrayNumber = array_filter($arrayNumber, "getNumberOnly");
    $arrayNumber = array_filter($arrayNumber, function ($value) {
        return ($value < 0);
    });

    return implode(", ", $arrayNumber);
}

