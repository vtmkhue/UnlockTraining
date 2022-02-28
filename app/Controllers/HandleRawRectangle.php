<?php

$rectangleStar = "";

$height = "";
$width = "";

//Draw rectangle star
if (isset($_POST["height"])) {
    $height = $_POST["height"];
    $width = $_POST["width"];

    $rectangleStar = validatedRectangleSizeInputValue($height);
    if (!empty($rectangleStar)) {
        return;
    }

    $rectangleStar = validatedRectangleSizeInputValue($width);
    if (!empty($rectangleStar)) {
        return;
    }

    $rectangleStar = drawRectangleStar($height, $width);
}
