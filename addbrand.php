<?php
include "slider.php";
include "brand_class.php";
?>
<?php
$brand= new brand;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category_id = $_POST['category_id'];
  $brand_name = $_POST['brand_name'] ;
  $insert_brand = $brand ->insert_brand($category_id,$brand_name) ;
} 
?>
<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>
<link rel="stylesheet" href="main.css">
        <div class="content" style="background: none;">
          <h1 class="hit-the-floor" >Thêm loại sản phẩm</h1><br> <br>
          <form action="" method="post">
            <select name="category_id" class="select_category">
                <option value="#">--Chọn danh mục</option>
                <?php 
                $show_category= $brand -> show_category();
                if ($show_category) {
                    while($result= $show_category -> fetch_assoc()) { 
                ?>
                <option value="<?php echo $result['categoryID'] ?>"><?php echo $result['categoryName'] ?></option>
                <?php 
                    }
                }
                ?>
                
            </select> <br> <br>
            <input type="text" name="brand_name" class="form-control"  placeholder="Nhập tên loại sản phẩm" />
            <br>
            <input onclick ="brand_add()" type="submit" class="btn btn-primary" value="Thêm">
            <!-- <button type="submit" class="btn btn-primary">Thêm</button> -->
          </form>
        </div>
        
        <script>
          //Kiểm tra form nhập thông tin
          function brand_add() {
        var brand = document.getElementsByClassName("form-control");
        var brand_name = brand[0].value;
        var select_category = document.getElementsByClassName("select_category")
        var category_name = select_category[0].value;
        if (brand_name == "" || category_name == "#") {
          event.preventDefault();
          alert("Vui lòng nhập đủ thông tin sản phẩm");
          }
        }
        </script>