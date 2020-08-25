<?php   
require('./db_config.php');
session_start();
if(isset($_SESSION['admin'])){
    $sql = "SELECT * FROM `product`";
    $res = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($res, MYSQLI_ASSOC);

    // Delete Product
    if(isset($_POST['product_delete_btn'])){
        // Fetching All the data to Delete a product
        $delete_item_id = $_POST['hidden_delete_item_id'];
    
        // SQL query to add product to the data
        $sql_delete_product = "DELETE FROM `product` WHERE id='$delete_item_id'";
    
        // Run Insert Command
    
        $run_delete_product_query = mysqli_query($conn, $sql_delete_product);
        if($run_delete_product_query){
            echo '<script>
            alert("product Deleted successfully");
            </script>';
        header(("Location: ./index.php"));

        }
        else{
            echo '<script>alert("Could not able to delete.")</script>';
        }
    
    }

    // Add Product
    
    if(isset($_POST['add_product_btn'])){
        // Fetching All the data to add a product
        $item_name = $_POST['item_name'];

        $size = $_POST['size'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $bbsr = $_POST['bbsr'];
        $cuttack = $_POST['cuttack'];
        $brahmapur = $_POST['brahmapur'];
        $jharsuguda = $_POST['jharsuguda'];
        $sundergarh = $_POST['sundergarh'];

        // SQL query to add product to the data
        $sql_add_product = "INSERT INTO `product`(`item_name`,`item_image`, `size`, `price`, `category`, `bbsr`, `cuttack`, `brahmapur`, `jharsuguda`, `sundergarh`) VALUES ('$item_name','$item_image','$size', '$price','$category', '$bbsr', '$cuttack', '$brahmapur', '$jharsuguda', '$sundergarh' )";

        // Run Insert Command

        $run_add_product_query = mysqli_query($conn, $sql_add_product);
        if($run_add_product_query){
            echo '<script>alert("product Added successfully")</script>';
        }
        else{
            echo '<script>alert("Not Added")</script>';
        }

    }

    // Edit Product
    if(isset($_POST['edit_product_btn'])){
        $id = $_POST['hidden_edit_item_id'];
        $item_name = $_POST['item_name'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $bbsr = $_POST['bbsr'];
        $cuttack = $_POST['cuttack'];
        $brahmapur = $_POST['brahmapur'];
        $jharsuguda = $_POST['jharsuguda'];
        $sundergarh = $_POST['sundergarh'];

        $sql_edit_product = "UPDATE `product` SET `item_name`='$item_name',`size`='$size',`price`='$price',`category`='$category',`bbsr`='$bbsr',`cuttack`='$cuttack',`brahmapur`='$brahmapur',`jharsuguda`='$jharsuguda',`sundergarh`='$sundergarh' WHERE `id`='$id'";
        $run_add_product_query = mysqli_query($conn, $sql_edit_product);

        if(mysqli_num_rows($run_add_product_query)>0){
            echo '<script>alert("product Edited successfully")</script>';
            header(("Location: ./index.php"));
        }
        else{
            echo '<script>alert("Can Not Edit This Product")</script>';
            header(("Location: ./index.php"));

        }

    }

}
else{
    header(("Location: ./log-in.php?err=Please Login To Continue"));
    }
?>