<form id="frmFindNumber" action="" method="post">
  <h1>Find number</h1>

  <div><label for="arrayNumber" class="col-4 col-s-12">Array (seperated with comma):</label>
    <input type="text" class="col-5 col-s-12" id="arrayNumber" name="arrayNumber" value="<?php echo $arrayNumber; ?>"><br/>
  </div><br/>

  <div><label for="findOption" class="col-4 col-s-12">Options:</label>
    <select class="col-5 col-s-12" id="findOption" name="findOption">
      <option value="1" <?php echo ($findOption == "1") ? "selected" : "" ?>>Max value</option>
      <option value="2" <?php echo ($findOption == "2") ? "selected" : "" ?>>Min value</option>
      <option value="3" <?php echo ($findOption == "3") ? "selected" : "" ?>>Positive number</option>
      <option value="4" <?php echo ($findOption == "4") ? "selected" : "" ?>>Negative number</option>
    </select><br/>
  </div><br/>

  <input type="submit" id="btnFindNumber" class="submit-button" value="Submit"><br/>
  <hr>
  <p id="resFindNumber" class="resMessage"><?php echo $showResult; ?></p>
</form>
