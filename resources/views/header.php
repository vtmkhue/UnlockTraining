<?php

if (!isset($_SESSION["loginUser"]) || !isset($_COOKIE[$_SESSION["loginUser"]])) {
    header("Location: login?logout=1");
} else {
    $loginCookieSave = json_decode($_COOKIE[$_SESSION["loginUser"]], true);
}

// var_dump($loginCookieSave);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practise</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="../resources/css/style.css" type="text/css"> -->
    <style><?php include '../resources/css/style.css'; ?></style>
    <!-- Bootstrap library -->
    <!-- <link rel="stylesheet" href="../resources/css/bootstrap.css" type="text/css"> -->
    <style><?php include '../resources/css/bootstrap.css'; ?></style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script><?php //include '../resources/js/script.js'; ?></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <h2 style="display: inline-block;">This is my homework</h2>

        <nav id="nav-special" class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
              <a class="navbar-brand">Hi! 
                <p id="loginUserName" style="display: inline;">
                  <?php echo (isset($loginCookieSave["name"])) ? " " . $loginCookieSave["name"] : ""; ?>
                </p>
              </a>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="navbar-toggler-icon" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <!-- <li><a id="Info" class="dropdown-item">Info</a></li> -->
                      <li><a id="Logout" href="login?logout=1" class="dropdown-item">Logout</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    </header>
    
    <section>
        <nav class="side-bar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="main?view=findnumber" class="nav-link <?php echo (isset($_GET["view"]) && $_GET["view"] == "findnumber") ? "active" : ""; ?>">Find number</a>
                </li>
                <li class="nav-item">
                    <a href="main?view=savecookie" class="nav-link <?php echo (isset($_GET["view"]) && $_GET["view"] == "savecookie") ? "active" : ""; ?>">Save Cookie</a>
                </li>
                <li class="nav-item">
                    <a href="main?view=drawrectangle" class="nav-link <?php echo (isset($_GET["view"]) && $_GET["view"] == "drawrectangle") ? "active" : ""; ?>">Draw rectangle star</a>
                </li>
                <?php if (isset($loginCookieSave["rule"]) && $loginCookieSave["rule"] == "1") { ?>
                  <li class="nav-item">
                    <a href="/users" class="nav-link <?php echo (isset($uri[1]) && $uri[1] == "users") ? "active" : ""; ?>">Users management</a>
                  </li>
                <?php } ?>
            </ul>
        </nav>

        <article class="my-article" id="loadContent">
