<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="../css/style.css" type="text/css"> -->
  <style><?php include '../resources/css/style.css'; ?></style>
  <!-- Bootstrap -->
  <!-- <link rel="stylesheet" href="../css/bootstrap.css" type="text/css"> -->
  <style><?php include '../resources/css/bootstrap.css'; ?></style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>
  <!-- Vanilla datepicker -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css">
  <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker-full.min.js"></script> -->
  <!-- JQuery -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>
<body>
  <article id="loadindex">
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                  class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form id="LoginForm" action="" method="post">
              <!-- Username input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control form-control-lg"
                        name="username" placeholder="Enter username" value="<?php echo $username; ?>" />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-lg"
                        name="password" placeholder="Enter password" />
              </div>

      <!--          <div class="d-flex justify-content-between align-items-center">-->
      <!--            &lt;!&ndash; Checkbox &ndash;&gt;-->
      <!--            <div class="form-check mb-0">-->
      <!--              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />-->
      <!--              <label class="form-check-label" for="form2Example3">-->
      <!--                Remember me-->
      <!--              </label>-->
      <!--            </div>-->
      <!--            <a href="#!" class="text-body">Forgot password?</a>-->
      <!--          </div>-->

              <p id="errlogin" class="errMessage"><?php echo $errMessage; ?></p>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button id="btnLogin" type="submit" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                  <a id="loadregister" href="/register" class="link-danger">Register</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </article>
</body>
</html>
