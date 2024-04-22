<?php 
include 'database.php'; 
?>  
<?php
class brand {
    private $db;
    public function __construct() 
    {
        $this -> db = new Database();
    }
    public function insert_brand($category_id,$brand_name)
    {
        $query = "INSERT INTO tb_brand (categoryID,brand_name) VALUES('$category_id','$brand_name')";
        $result = $this -> db -> insert($query);
        header('Location:brand_list.php');
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
    public function get_brand($brand_id) {
        $query = "SELECT * FROM tb_brand WHERE brand_id = '$brand_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function update_brand($category_id,$brand_id,$brand_name) {
        $query = "UPDATE tb_brand 
        SET categoryID = '$category_id',
        brand_name = '$brand_name' WHERE brand_id = '$brand_id'";
        $result = $this -> db -> update($query);
        header('Location:brand_list.php');
        return $result;
    }
    public function delete_brand($brand_id) {
        $query = "DELETE FROM tb_brand WHERE brand_id='$brand_id'";
        $result = $this -> db -> delete($query);
        header('Location:brand_list.php');
        return $result;
    }
}
?>