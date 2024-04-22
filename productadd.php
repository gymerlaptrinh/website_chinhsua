<?php
include "slider.php";
include "product_class.php";
?>

<?php
$product= new product;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
   $insert_product = $product ->insert_product($_POST,$_FILES) ;
   echo'<script>alert("bạn đã thêm thành công sản phẩm");</script>';
  
} 
?>      
<link rel="stylesheet" href="main.css" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
<div class="content">
    <div class="container">
        <h1 class="hit-the-floor">Sản phẩm</h1>
        <!-- QUẢN LÝ SẢN PHẨM -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">FORM</a
            >
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <!-- TAB FORM -->
          <div
            class="tab-pane fade show active"
            id="home"
            role="tabpanel"
            aria-labelledby="home-tab"
          >
            <!-- FORM -->
            <br>
            <form id="productForm" method="post" enctype="multipart/form-data">
              <div class="col-sm">
                <div class="mb-3">
                  <label for="name" class="form-label">TÊN SẢN PHẨM</label>
                  <input class="form-control" id="name" name="product_name"/>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">CHỌN DANH MỤC: </label> <br>
                  <select name="category_id" class="select">
                    <option value="#">--Chọn</option> 
                    <?php 
                      $show_category= $product -> show_category();
                      if ($show_category) {
                          while($result= $show_category -> fetch_assoc()) { 
                      ?>
                      <option value="<?php echo $result['categoryID'] ?>"><?php echo $result['categoryName'] ?></option>
                      <?php 
                          }}
                      ?>       
                  </select> 
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">CHỌN LOẠI SẢN PHẨM: </label> <br>
                  <select name="brand_id" class="select">
                    <option value="#">--Chọn</option>
                    <?php 
                      $show_brand= $product -> show_brand();
                      if ($show_brand) {
                          while($result= $show_brand -> fetch_assoc()) { 
                      ?>
                      <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                      <?php 
                          }}
                      ?>  
                  </select>
                </div>
                <div class="mb-3">
                  <label for="origin" class="form-label">GIÁ SẢN PHẨM</label>
                    <input class="form-control" id="name" name="product_price" type="text" />
                </div>
                <div class="mb-3">
                  <label for="origin" class="form-label">GIÁ KHUYẾN MÃI</label>
                    <input class="form-control" id="name" name="product_discount" type="text" />
                </div>
                <!-- IMAGE -->
                <div class="row">
                  <div align="center" class="col">
                    <label for="origin" class="form-label">ẢNH SẢN PHẨM</label>
                    <input name="product_img" type="file" />
                  </div>
                </div>
                <br />
                <!-- BUTTON -->
                <div class="btnForm">
                  <!-- <button type="submit" class="btn btn-primary">Mới</button> -->
                  <input onclick="send_product()" type="submit" class="btn btn-primary" value="Thêm"/>
                  <!-- <button type="submit" class="btn btn-primary">Sửa</button> 
                  <button type="submit" class="btn btn-primary">Xóa</button> -->
                </div>
                <div style="width:max-content height:30px">
                            <br>
                            <br>
                            <br>
                            <br>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- JAVASCRIPT -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
      //validation_product_Add
      function send_product() {
        var arr_product = document.getElementsByTagName("input");
        var product_name = arr_product[0].value;
        var product_price = arr_product[1].value;
        var product_discount = arr_product[2].value;
        var arr_select = document.getElementsByClassName("select")
        var option_1 = arr_select[0].value;
        var option_2 = arr_select[1].value;
        if (product_name == "" || 
            product_price == "" || 
            option_1 =="#" || 
            option_2 =="#") {
          event.preventDefault();
          alert("Vui lòng nhập đủ thông tin sản phẩm");
          }
        }
    </script>