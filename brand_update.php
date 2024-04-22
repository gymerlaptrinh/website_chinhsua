<?php
// include "index.php";
include "brand_class.php";
include "slider.php";
?>

<?php
$brand = new brand;
if(isset($_GET['brand_id']) || $_GET['brand_id'] != NULL) {
    $brand_id = $_GET['brand_id'];
}
    $get_brand = $brand ->get_brand($brand_id);
    if($get_brand) {
        $result_brand = $get_brand -> fetch_assoc();
    }

?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category_id = $_POST['category_id'];
  $brand_name = $_POST['brand_name'] ;
  $update_brand = $brand->update_brand($category_id,$brand_id,$brand_name) ; }
?>
<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>
<link rel="stylesheet" href="main.css">
        <div class="content" style="background: none;">
          <h1>Sửa loại sản phẩm</h1><br>
          <form action="" method="post">
            <select name="category_id" class="select_category">
                <option value="#">--Chọn danh mục</option>
                <?php 
                $show_category= $brand -> show_category();
                if ($show_category) {
                    while($result= $show_category -> fetch_assoc()) { 
                ?>
                <option <?php if ($result['categoryID']==$result_brand['categoryID']) {echo "selected";} ?> value="<?php echo $result['categoryID'] ?> "><?php echo $result['categoryName'] ?></option>
                <?php 
                    }
                }
                ?>
                
            </select> <br><br>
            <input type="text" name="brand_name" class="form-control"  placeholder="Nhập tên loại sản phẩm" value="<?php echo $result_brand['brand_name'] ?>"/>
            <br>
            <button onclick="update_brand()" type="submit" class="btn btn-primary">Sửa</button>
          </form>
        </div>

        <script>
          function update_brand() {
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