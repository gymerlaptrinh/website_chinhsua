<?php 
include 'database.php'; 
?>  
<?php
class category {
    private $db;
    public function __construct() 
    {
        $this -> db = new Database();
    }
    public function insert_category($category_name) 
    {
        $query = "INSERT INTO tb_category (categoryName) VALUES('$category_name')";
        $result = $this -> db ->insert($query);
        header('Location:category_list.php');
    }
    public function show_category(){
        $query = "SELECT * FROM tb_category ORDER BY categoryID DESC";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function get_category($category_id) {
        $query = "SELECT * FROM tb_category WHERE categoryID = '$category_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function update_category($category_name, $category_id) {
        $query = "UPDATE tb_category SET categoryName = '$category_name' WHERE categoryID = '$category_id'";
        $result = $this -> db -> update($query);
        header('Location:category_list.php');
        return $result;
    }
    public function delete_category($category_id) {
        $query = "DELETE FROM tb_category WHERE categoryID='$category_id'";
        $result = $this -> db -> delete($query);
        header('Location:category_list.php');
        return $result;
    }
}
?>