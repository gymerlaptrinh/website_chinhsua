<?php
include "slider.php";
include "category_class.php";
?>

<?php
$category= new category;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category_name = $_POST['category_name'];
  $insert_category = $category -> insert_category($category_name) ;
}
?>      
        <link rel="stylesheet" href="main.css">
        <div class="content" style="background:none">
            <div class="container" >
                <h1 class="hit-the-floor" >Thêm danh mục</h1>
                <!-- FORM -->
                <form id="formLoai" action="" method="post">
                    <div class="mb-3">
                    <input  class="form-control" id="name" type="text" name="category_name" placeholder="Nhập tên danh mục" />
                    <br>
                    <input onclick = "send_category()" type="submit" class="btn btn-primary" value='Thêm'>
                    </div>
                </form>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/main.js"></script>
        <script>
            // Validation_category_Add
            function send_category() {
            var arr_category = document.getElementsByClassName("form-control");
            var category_form = arr_category[0].value;
            if (category_form == "") {
                alert("Vui lòng nhập tên danh mục");
                event.preventDefault();
                }
            }
        </script>