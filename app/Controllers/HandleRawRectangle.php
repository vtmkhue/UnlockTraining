<?php

$showResult = "";

$height = "";
$width = "";

//Draw rectangle star
if (isset($_POST["height"])) {
    $height = $_POST["height"];
    $width = $_POST["width"];

    $showResult = validatedRectangleSizeInputValue($height);
    if (!empty($showResult)) {
        return;
    }

    $showResult = validatedRectangleSizeInputValue($width);
    if (!empty($showResult)) {
        return;
    }

    $showResult = drawRectangleStar($height, $width);
}
