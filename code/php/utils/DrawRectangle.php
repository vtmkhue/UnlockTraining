<?php

function validatedRectangleSizeInputValue(string $rectangleSizeInput): string
{
    $errMessage = "";

    if (empty($rectangleSizeInput) && $rectangleSizeInput != "0") {
        $errMessage = "The rectangle size cannot be empty.";
        goto endfunction;
    }

    if (!is_numeric($rectangleSizeInput)) {
        $errMessage = "The rectangle size must be a number.";
        goto endfunction;
    }

    if (strpos($rectangleSizeInput, ".") !== false) {
        $errMessage = "The rectangle size must be a integer number.";
        goto endfunction;
    }

    if ($rectangleSizeInput <= 0) {
        $errMessage = "The rectangle size must be a positive integer number.";
        goto endfunction;
    }

    endfunction:
    return $errMessage;
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

    $fullLineContent = $lineWithMissStar;
    for ($i = 1; $i < ($height - 2); $i++) {
        $fullLineContent .= "<br/>" . $lineWithMissStar;
    }

    return $lineWithFullStar . "<br/>" . $fullLineContent . "<br/>" . $lineWithFullStar;
}
