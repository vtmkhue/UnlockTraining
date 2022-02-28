<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css">
  <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker-full.min.js"></script>
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <article id="loadindex">
    <section class="vh-100 gradient-custom">
      <div class="container h-100"> <!-- py-5 -->
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
              <div class="card-body p-4 p-md-5" style="padding-bottom: 5px !important;">
                <h3 class="mb-4 pb-2 pb-md-0">Registration Form</h3>
                <form id="FormInsertUser" action="" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-outline">
                        <label class="form-label" for="name">Full name</label>
                        <input type="text" id="name" name="name" class="form-control form-control-lg" value="<?php echo $fullname; ?>" />
                      </div>
                      <p id="errname" class="errMessage"><?php echo $errName; ?></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="birthdayDate" class="form-label">Birthday</label>
                      <div class="input-group">
                        <!-- <i class="fa fa-calendar input-group-text"></i> -->
                        <input type="text" id="birthdayDate" name="birthdayDate" class="datepicker_input form-control" value="<?php echo $birthdayDate; ?>">
                      </div>
                      <!-- <div class="form-outline datepicker w-100">
                        <input type="text" id="birthdayDate" name="birthdayDate" class="form-control form-control-lg" />
                      </div> -->
                      <p id="errbod" class="errMessage"><?php echo $errBirthday; ?></p>
                    </div>

                    <div class="col-md-6">
                      <h6 class="mb-2 pb-1" style="padding-top: 10px;">Gender: </h6>
                      <div class="form-check form-check-inline">
                        <label class="form-check-label" for="femaleGender" style="padding-top: 0px;">Female</label>
                        <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="1" 
                          <?php echo ($gender == "1") ? "checked" : "" ?> />
                      </div>
                      <div class="form-check form-check-inline">
                        <label class="form-check-label" for="maleGender" style="padding-top: 0px;">Male</label>
                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="2" 
                          <?php echo ($gender == "2") ? "checked" : "" ?>/>
                      </div>
                      <div class="form-check form-check-inline">
                        <label class="form-check-label" for="otherGender" style="padding-top: 0px;">Other</label>
                        <input class="form-check-input" type="radio" name="gender" id="otherGender" value="3" 
                          <?php echo ($gender == "3") ? "checked" : "" ?>/>
                      </div>
                      <p id="errgender" class="errMessage" style="padding-top: 12px"><?php echo $errGender; ?></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pb-2">
                      <div class="form-outline">
                        <label class="form-label" for="emailAddress">Email</label>
                        <input type="email" name="emailAddress" id="emailAddress" class="form-control form-control-lg" value="<?php echo $emailAddress; ?>" />
                      </div>
                      <p id="erremail" class="errMessage"><?php echo $errEmail; ?></p>
                    </div>
                    <div class="col-md-6 pb-2">
                      <div class="form-outline">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control form-control-lg" value="<?php echo $phoneNumber; ?>" />
                      </div>
                      <p id="errphone" class="errMessage"><?php echo $errPhone; ?></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="form-outline">
                        <label class="form-label" for="newusername">Username</label>
                        <input type="text" id="newusername" name="newusername" class="form-control form-control-lg" value="<?php echo $username; ?>" />
                      </div>
                      <p id="errusername" class="errMessage"><?php echo $errUsername; ?></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pb-2">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6 pb-2">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="repassword">Repeat your password</label>
                        <input type="password" name="repassword" id="repassword" class="form-control" />
                      </div>
                    </div>
                    <p id="errpass" class="errMessage"><?php echo $errPass; ?></p>
                  </div>

    <!--              <div class="form-check d-flex justify-content-center mb-4">-->
    <!--                <input class="form-check-input me-2" type="checkbox" value="" id="agree" />-->
    <!--                <label class="form-check-label" for="agree" style="padding: 0px;">-->
    <!--                  I agree all statements in <a href="#!">Terms of service</a>-->
    <!--                </label>-->
    <!--              </div>-->

                  <p id="errinsert" class="errMessage" style="text-align: center;"><?php echo $errInsertUser; ?></p>
                  <div class="d-flex justify-content-center mx-4 mb-lg-4 mb-4 mt-2">
                    <button id="btnSubmit" type="submit" class="btn btn-primary btn-lg">Register</button>
                    <a href="index.php">
                      <button id="btnBack" type="button" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Back</button>
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Button trigger modal -->
    <button id="showDialog" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" hidden>Back to Login</button>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Congratulation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Your registration is successful.
          </div>
          <div class="modal-footer">
    <!--        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
            <a href="index.php">
              <button type="button" class="btn btn-primary">Go to login page</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </article>
  <script>
    $(document).ready(function(e){
      <?php if ($successInsert) { ?>
        $('#showDialog').click();
      <?php } ?>
      
      /* Bootstrap 5 JS included */
      /* vanillajs-datepicker 1.1.4 JS included */
      const getDatePickerTitle = elem => {
        // From the label or the aria-label
        const label = elem.nextElementSibling;
        let titleText = '';
        if (label && label.tagName === 'LABEL') {
          titleText = label.textContent;
        } else {
          titleText = elem.getAttribute('aria-label') || '';
        }
        return titleText;
      }

      const elem = document.querySelector('input[name="birthdayDate"]');
      const datepicker = new Datepicker(elem, {
        'format': 'dd/mm/yyyy', // UK format
        title: getDatePickerTitle(elem)
      }); 
    });
  </script>
</body>
</html>
