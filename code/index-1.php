<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
  <header>
    <h2>Hóa đơn bán hàng</h2>
  </header>

  <article>
    <form id="frmSubmit" method="post">
      <div class="leftSide">
        <div>
          <label for="Product_CD" class="col-2 col-s-12">Mã sản phẩm:</label>
          <input type="text" id="txtProduct_CD" class="col-5 col-s-12" name="Product_CD" value="">
        </div><br/>

        <div>
          <label for="Product_Name" class="col-2 col-s-12">Tên sản phẩm:</label>
          <input type="text" id="txtProduct_Name" class="col-5 col-s-12" name="Product_Name" value="">
        </div><br/>

        <div>
          <label for="Unit" class="col-2 col-s-12">Đơn vị tính:</label>
          <select id="txtUnit" class="col-5 col-s-12" name="Unit">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select>
        </div><br/>

        <div>
          <label for="Unit_Price" class="col-2 col-s-12">Đơn giá:</label>
          <input type="text" id="txtUnit_Price" class="money col-5 col-s-12" name="Unit_Price" value="">
        </div><br/>

        <div>
          <label for="Kind" class="col-2 col-s-12" style="padding: 0px;">Giá giảm:
            <span class="dis_info">(trên 1 đơn vị tính)<span>
          </label>
          <select id="txtKind" class="col-1 col-s-3 col-st-3" name="Kind">
            <option value="0">%</option>
            <option value="1">VNĐ</option>
          </select>
          <input type="text" id="txtDiscount" class="money col-3 col-s-8 col-st-8" name="Discount" value="">
        </div><br/>

        <div>
          <label for="Amount" class="col-2 col-s-12">Số lượng:</label>
          <input type="text" id="txtAmount" class="money col-5 col-s-12" name="Amount" value="">
        </div><br/>

        <input type="button" id="btnAddProduct" class="submit-button" value="Thêm mặt hàng">
        <input type="button" id="btnClear" class="cancel-button" value="Tìm kiếm mới">
      </div>

      <div class="center">
        <p>(Đơn vị tiền tệ: VNĐ)</p>
        <table id="tblShowInfo">
          <tr>
            <th style="width: 15px;">Xóa</th>
            <th style="width: 15px;">STT</th>
            <th>Tên sản phẩm</th>
            <th style="width: 70px;">Đơn vị</th>
            <th style="width: 110px;">Đơn giá</th>
            <th style="width: 120px;">Giá giảm</th>
            <th>Thành tiền</th>
          </tr>
          <tr>
            <td><input type="image" class="btnDel" src="img/delete-icon.png" width="16" height="16"></td>
            <td>Smith</td>
            <td>50</td>
            <td>hộp 1 lít</td>
            <td>1,000,000,000</td>
            <td>50</td>
            <td>50</td>
          </tr>
        </table>

        <div id="tblSum">
           <div>
              <div id="tdSumVal">50</div>
              <div>Tổng:</div>
           </div>
        </div>
      </div>


      <div class="rightSide">
          <input type="button" id="btnClearAll" class="cancel-button" value="Tạo Hóa đơn mới">
          <input type="button" id="btnAddInvoice" class="submit-button" value="Lưu">
      </div>
    </form>
  </article>

  <footer>
  </footer>
</body>
</html>
