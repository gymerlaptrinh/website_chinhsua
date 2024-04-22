<?php
include "slider.php";
include "product_class.php";
?>

<?php
$product = new product;
if(isset($_GET['product_id']) || $_GET['product_id'] != NULL) {
    $product_id = $_GET['product_id'];
}
    $get_product = $product ->get_product($product_id);
    if($get_product) {
        $result_product = $get_product -> fetch_assoc();
    }
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category_id = $_POST['category_id'];
  $brand_id = $_POST['brand_id'] ;
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_discount = $_POST['product_discount'];
  $product_img = $_POST['product_img'];
  $update_product = $product ->update_product($category_id,$brand_id,$product_id,$product_name,$product_price,$product_discount,$product_img) ;
   echo'<script>alert("bạn đã sửa thành công sản phẩm"); window.location.href = "product_list.php";</script>';
} 
?>      
<link rel="stylesheet" href="main.css" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
<div class="content">
    <div class="container">
        <h1 class="hit-the-floor">Sửa sản phẩm</h1>
        <!-- QUẢN LÝ SẢN PHẨM -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">FORM</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="profile-tab"
              data-bs-toggle="tab"
              href="#profile"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
              >DANH SÁCH</a
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
                  <input class="form-control" id="name" name="product_name"
                   value="<?php echo $result_product['product_name']?>"/>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">CHỌN DANH MỤC: </label>
                  <select name="category_id" class="select">
                    <option value="#">--Chọn danh mục</option> 
                    <?php 
                      $show_category = $product -> show_category();
                      if ($show_category) {
                          while($result= $show_category -> fetch_assoc()) { 
                      ?>
                      <option <?php if($result_product['category_id'] == $result['categoryID']){echo"selected";} ?> value = <?php echo $result['categoryID']?>> <?php echo $result['categoryName']?> </option>
                      <?php 
                          }}
                      ?>       
                  </select> 
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">CHỌN LOẠI SẢN PHẨM: </label>
                  <select name="brand_id" class="select">
                    <option value="#">--Chọn loại sản phẩm</option>
                    <?php 
                      $show_brand = $product -> show_brand();
                      if ($show_brand) {
                          while ($result= $show_brand -> fetch_assoc()) { 
                      ?>
                      <option <?php if( $result_product['brand_id'] == $result['brand_id']){echo "selected";}?> value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                      <?php 
                          }}
                      ?>  
                  </select>
                </div>
                <div class="mb-3">
                  <label for="origin" class="form-label">GIÁ SẢN PHẨM</label>
                    <input class="form-control" id="name" name="product_price" type="text" 
                    value="<?php echo $result_product['product_price']?>"/>
                </div>
                <div class="mb-3">
                  <label for="origin" class="form-label">GIÁ KHUYẾN MÃI</label>
                    <input class="form-control" id="name" name="product_discount" type="text" 
                    value="<?php echo $result_product['product_discount']?>"/>
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
                  <input onclick="edit_product()" type="submit" class="btn btn-primary" value="Sửa"/>
                  <!-- <button onclick="edit_product()" type="submit" class="btn btn-primary">Sửa</button> -->
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
          <!-- TAB DANH SÁCH -->
          <div
            class="tab-pane fade"
            id="profile"
            role="tabpanel"
            aria-labelledby="profile-tab"
          >
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>SL</th>
                    <th>Xuất xứ</th>
                    <th>Loại</th>
                    <th>NCC</th>
                    <th>Ngày ĐK</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Surface Laptop 4 Ryzen 5</td>
                    <td>27.000.000 đ</td>
                    <td>3</td>
                    <td>Trung Quốc</td>
                    <td>Laptop</td>
                    <td>Apple</td>
                    <td><i class="fas fa-edit"></i></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- JAVASCRIPT -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
      //validation_product_Update
      function edit_product() {
        var arr_product = document.getElementsByClassName("form-control");
        var product_name = arr_product[0].value;
        var product_price = arr_product[1].value;
        var arr_select = document.getElementsByClassName("select")
        var option_1 = arr_select[0].value;
        var option_2 = arr_select[1].value;
        if (product_name == "" || 
            product_price == "" || 
            option_1 == "#" || 
            option_2 == "#" ) {
          event.preventDefault();
          alert("Vui lòng nhập đủ thông tin sản phẩm");
          }
        }
    </script>