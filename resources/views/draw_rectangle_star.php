
  <form id="frmDrawStar" action="" method="post">
    <h1>Draw rectangle star</h1>

    <div><label for="height" class="col-2 col-s-12">Height:</label>
      <input type="number" class="col-5 col-s-12" id="height" name="height" value="<?php echo $height; ?>"><br/>
    </div><br/>

    <div><label for="width" class="col-2 col-s-12">Width:</label>
      <input type="number" class="col-5 col-s-12" id="width" name="width" value="<?php echo $width; ?>"><br/>
    </div><br/>

    <input type="submit" id="btnDrawStar" class="submit-button" value="Submit"><br/>
    <hr>
    <pre id="resRectangleStar" class="resMessage"><?php echo $showResult; ?></pre>
  </form>
