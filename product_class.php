<?php 
include 'database.php'; 
?>  
<?php
class product {
    private $db;
    public function __construct() 
    {
        $this -> db = new Database();
    }
    public function show_category(){
        $query = "SELECT * FROM tb_category ORDER BY categoryID DESC";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function show_brand(){
        $query = "SELECT tb_brand.*, tb_category.categoryName 
                  FROM tb_brand INNER JOIN tb_category
                  ON tb_brand.categoryID=tb_category.categoryID
                  ORDER BY tb_brand.brand_id DESC ";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function insert_product()
    {
        $product_name=$_POST['product_name'];
        $category_id=$_POST['category_id'];
        $brand_id=$_POST['brand_id'];   
        $product_price=$_POST['product_price'];
        $product_discount=$_POST['product_discount'];
        $product_img=$_FILES['product_img']['name'];
        move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);

        $query = "INSERT INTO tb_product (
            product_name,
            category_id,
            brand_id,
            product_price,
            product_discount,
            product_img
            ) 
        VALUES(
            '$product_name',
            '$category_id',
            '$brand_id',
            '$product_price',
            '$product_discount',
            '$product_img') ";
        $result = $this -> db -> insert($query);
        // header('Location:brand_list.php');
        return $result;
    }

    public function show_product(){
        $query = "SELECT tb_product.*
                  FROM tb_product ";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function delete_product($product_id) {
        $query = "DELETE FROM tb_product WHERE product_id='$product_id'";
        $result = $this -> db -> delete($query);
        header('Location:product_list.php');
        return $result;
    }
    public function get_product($product_id) {
        $query = "SELECT * FROM tb_product WHERE product_id = '$product_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function update_product($category_id,$brand_id,$product_id,$product_name,$product_price,$product_discount,$product_img) {
        $query = "UPDATE tb_product 
        SET category_id = '$category_id',
            brand_id = '$brand_id',
            product_name ='$product_name',
            product_price = '$product_price',
            product_discount = '$product_discount',
            product_img = '$product_img'
        WHERE product_id = '$product_id'" ;
        $result = $this -> db -> update($query);
        header('Location:product_list.php');
        return $result;
    } }
?>

