<?php
//setcookie("create", "Homework2", time() + 300, '/');
//var_dump($_COOKIE);

//Homework 1+2
$errMessage = "";
$strResult = "";

$strInput1 = "";
if (isset($_COOKIE["strInput1"]))
    $strInput1 = $_COOKIE["strInput1"];

$strInput2 = "1";
if (isset($_COOKIE["strInput2"]))
    $strInput2 = $_COOKIE["strInput2"];

//var_dump($_POST["arrOption"]);

if (isset($_POST["txtInputArray"])) {
    //Do not run code again if input value unchanged
    if ($strInput1 == $_POST["txtInputArray"]
        && $strInput2 == $_POST["arrOption"]) {
        if (isset($_COOKIE["errMessage"]))
            $errMessage = $_COOKIE["errMessage"];

        if (isset($_COOKIE["strResult"]))
            $strResult = $_COOKIE["strResult"];
        goto end_function;
    }

    $strInput1 = $_POST["txtInputArray"];
    $strInput2 = $_POST["arrOption"];

    if (empty($strInput1))
        $errMessage = "Input must not empty.";
    else {
        $strTemp = preg_replace('/\s+/', '', $strInput1);
        $arrSplit = explode(",", $strTemp);
        sort($arrSplit);

        if ($strInput2 == "max" || $strInput2 == "positive") {
            for ($i = (count($arrSplit) - 1); $i >= 0; $i--) {
                if (!is_numeric($arrSplit[$i]))
                    continue;

                if ($strInput2 == "max" && empty($strResult)) {
                    $strResult = $arrSplit[$i];
                    break;
                }

                if ($strInput2 == "positive") {
                    if ($arrSplit[$i] > 0)
                        $strResult .= $arrSplit[$i] . " ";
                    else break;
                }
            }
        }

        if ($strInput2 == "min" || $strInput2 == "negative") {
            for ($i = 0; $i < count($arrSplit); $i++) {
                if (!is_numeric($arrSplit[$i]))
                    continue;

                if ($strInput2 == "min" && empty($strResult)) {
                    $strResult = $arrSplit[$i];
                    break;
                }

                if ($strInput2 == "negative") {
                    if ($arrSplit[$i] < 0)
                        $strResult .= $arrSplit[$i] . " ";
                    else break;
                }
            }
        }

        //var_dump($strResult);

        if (empty($strResult))
            $strResult = "No number found";
        else $strResult = "Result is " . $strResult;
    }

//    if (!isset($_COOKIE)) {
        setcookie("strInput1", $_POST["txtInputArray"], time() + 300, '/');
        setcookie("strInput2", $_POST["arrOption"], time() + 300, '/');
        setcookie("strResult", $strResult, time() + 300, '/');
        setcookie("errMessage", $errMessage, time() + 300, '/');
//    } else {
//        $_COOKIE["strInput1"] = $_POST["txtInputArray"];
//        $_COOKIE["strInput2"] = $_POST["arrOption"];
//        $_COOKIE["strResult"] = $strResult;
//        $_COOKIE["errMessage"] = $errMessage;
//    }


    end_function:
}

//Homework 3
$errMessage2 = "";
$strResult2 = "";

$strHeight = "";
//if (isset($_COOKIE["strHeight"]))
//    $strHeight = $_COOKIE["strHeight"];

$strWidth = "";
//if (isset($_COOKIE["strWidth"]))
//    $strWidth = $_COOKIE["strWidth"];

if (isset($_POST["txtHeight"])) {
    //Do not run code again if input value unchanged
//    if ($strHeight == $_POST["txtHeight"]
//        && $strWidth == $_POST["txtWidth"]) {
//        if (isset($_COOKIE["errMessage2"]))
//            $errMessage2 = $_COOKIE["errMessage2"];
//
//        if (isset($_COOKIE["strResult2"]))
//            $strResult2 = $_COOKIE["strResult2"];
//        goto end_function2;
//    }

    $strHeight = $_POST["txtHeight"];
    $strWidth = $_POST["txtWidth"];

    if (empty($strHeight) || !is_numeric($strHeight) || $strHeight <= 0)
        $errMessage2 = "Height must a positive number.";
    else if (empty($strWidth) || !is_numeric($strWidth) || $strWidth <= 0)
        $errMessage2 = "Width must a positive number.";
    else {
        $strFull = "*";
        $strMiss = "*";
        for ($i = 1; $i < ($strWidth - 1); $i++) {
            $strFull .= "*";
            $strMiss .= "&nbsp;";
        }
        $strFull .= "*";
        $strMiss .= "*";

        //var_dump($strHeight);
        //var_dump($strWidth);

        //var_dump($strMiss);

        $strTemp = $strMiss;
        for ($i = 1; $i < ($strHeight - 2); $i++) {
            $strTemp .= "<br/>" . $strMiss;
        }

        $strResult2 = $strFull . "<br/>" . $strTemp . "<br/>" . $strFull;
    }

//    setcookie("strHeight", $_POST["txtHeight"], time()+ 300, '/');
//    setcookie("strWidth", $_POST["txtWidth"], time()+ 300, '/');
//    setcookie("strResult2", $strResult2, time()+ 300, '/');
//    setcookie("errMessage2", $errMessage2, time()+ 300, '/');

//    $_COOKIE["strHeight"] = $_POST["txtHeight"];
//    $_COOKIE["strWidth"] = $_POST["txtWidth"];
//    $_COOKIE["strResult2"] = $strResult2;
//    $_COOKIE["errMessage2"] = $errMessage2;

//    end_function2:
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Practise</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
  <header>
    <h2>This is my homework</h2>
  </header>

  <article>
    <form id="frmSubmit" action="index.php" method="post">
        <h1>Find number + Cookie</h1>

        <div><label for="txtInputArray" class="col-2 col-s-12">Array (seperated with comma):</label>
          <input type="text" class="col-5 col-s-12" id="txtInputArray" name="txtInputArray"
                 value="<?php echo $strInput1; ?>"><br/>
        </div><br/>

        <div><label for="arrOption" class="col-2 col-s-12">Options:</label>
          <select class="col-5 col-s-12" id="arrOption" name="arrOption">
            <option value="max" <?php if ($strInput2 == "max") echo "selected"; ?>>Max value</option>
            <option value="min" <?php if ($strInput2 == "min") echo "selected"; ?>>Min value</option>
            <option value="positive" <?php if ($strInput2 == "positive") echo "selected"; ?>>Positive number</option>
            <option value="negative" <?php if ($strInput2 == "negative") echo "selected"; ?>>Negative number</option>
          </select><br/>
        </div><br/>

        <input type="submit" id="btnSubmit" class="submit-button" value="Submit"><br/>
        <?php if (!empty($errMessage))
                echo '<p id="errMessage" class="errMessage">' . $errMessage .  '</p>';
            else echo '<p id="resResult" class="resMessage">' . $strResult .  '</p>'; ?>
    </form>

    <hr>

    <form id="frmSubmit2" action="index.php" method="post">
          <h1>Rectangle star</h1>

          <div><label for="txtHeight" class="col-2 col-s-12">Height:</label>
              <input type="text" class="col-5 col-s-12" id="txtHeight" name="txtHeight"
                     value="<?php echo $strHeight; ?>"><br/>
          </div><br/>

          <div><label for="txtWidth" class="col-2 col-s-12">Width:</label>
              <input type="text" class="col-5 col-s-12" id="txtWidth" name="txtWidth"
                     value="<?php echo $strWidth; ?>"><br/>
          </div><br/>

          <input type="submit" id="btnSubmit2" class="submit-button" value="Submit"><br/>
          <?php if (!empty($errMessage2))
                echo '<p id="errMessage2" class="errMessage">' . $errMessage2 .  '</p>';
            else echo '<pre id="resResult2" class="resMessage">' . $strResult2 .  '</pre>'; ?>
    </form>
  </article>

  <footer>
  </footer>
</body>
</html>
