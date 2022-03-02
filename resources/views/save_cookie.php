  <form id="frmSaveCookie" action="" method="post">
    <h1>Save Cookie</h1>

    <label>Choose your options:</label><br/>
    <div class="col-4 col-s-12">
      <input type="radio" name="food" id="chickenfried" value="chickenfried"
        <?php echo ($urlImageName == "chickenfried") ? "checked" : ""; ?> />
      <label for="chickenfried">Fried Chicken</label><br/>
    
      <input type="radio" name="food" id="hotpot" value="hotpot"
        <?php echo ($urlImageName == "hotpot") ? "checked" : ""; ?> />
      <label for="hotpot">Hot Pot</label><br/>
    
      <input type="radio" name="food" id="pizza" value="pizza"
        <?php echo ($urlImageName == "pizza") ? "checked" : ""; ?> />
      <label for="pizza">Pizza</label><br/>
    
      <input type="radio" name="food" id="sushi" value="sushi"
        <?php echo ($urlImageName == "sushi") ? "checked" : ""; ?> />
      <label for="sushi">Sushi</label><br/>
    </div>
    <div class="col-5 col-s-12">
      <img id="showImage" height="183" width="275" title="Your chosen" alt="Your chosen" 
        <?php echo $displayImage;
        if (!empty($urlImageName)) {
            $image = "../resources/images/" . $urlImageName . ".jpg";
            echo " src='data:image/jpg;base64," . base64_encode(file_get_contents($image)) . "'";
        } ?> />
    </div>
  </form>

  <script>
    $(document).ready(function(e){
      $('input[type="radio"]').click(function(){
        $("#frmSaveCookie").submit();
      });
    });
  </script>
