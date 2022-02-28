<?php

function validatedRectangleSizeInputValue(string $rectangleSizeInput): string
{
    if (empty($rectangleSizeInput) && $rectangleSizeInput != "0") {
        return "The rectangle size cannot be empty.";
    }

    if (!is_numeric($rectangleSizeInput)) {
        return "The rectangle size must be a number.";
    }

    if (strpos($rectangleSizeInput, ".") !== false) {
        return "The rectangle size must be a integer number.";
    }

    if ($rectangleSizeInput <= 0) {
        return "The rectangle size must be a positive integer number.";
    }

    return "";
}

function drawRectangleStar(int $height, int $width): string
{
    $star = "*";
    $lineWithFullStar = str_pad($star, $width, "*");
    if ($height == 1) {
        return $lineWithFullStar;
    }

    $lineWithMissStar = str_pad($star, ($width - 1), " ");
    if ($width != 1) {
        $lineWithMissStar .= "*";
    }

    $fullLineContent = "";
    for ($i = 1; $i < ($height - 1); $i++) {
        $fullLineContent .= "<br/>" . $lineWithMissStar;
    }

    return $lineWithFullStar . $fullLineContent . "<br/>" . $lineWithFullStar;
}
