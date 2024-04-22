<?php
include "slider.php";
include "category_class.php";
?>

<?php
$category = new category;
if(isset($_GET['categoryID']) OR $_GET['categoryID'] != NULL) {
    $categoryID= $_GET['categoryID'];
}
    $get_category = $category ->get_category($categoryID);
    if($get_category) {
        $result = $get_category -> fetch_assoc();
    }
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name']; // corrected variable name
    $update_category = $category->update_category($category_name, $categoryID);
}
?>

<link rel="stylesheet" href="main.css">
<div class="content">
    <h1>Sửa danh mục</h1>
    <form action="" method="post">
        <input required type="text" name="category_name" placeholder="Nhập tên danh mục" value="<?php echo $result['categoryName'] ?>" />
        <button type="submit">Sửa</button>
    </form>
</div>
