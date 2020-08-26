<?php 
require 'db_config.php' ;

    if($_POST['hUserId']){
        $hUserId = $_POST['hUserId'];
        session_start();
        $location_filter = $_SESSION['global_location'];
        $c_name = $_POST['c_name'];
        $c_phone = $_POST['c_phone'];
        $c_email = $_POST['c_email'];
        $c_address = $_POST['c_address'];
        $c_zip = $_POST['c_zip'];
        $shipping = 0;
        $payment_mode = "Online";
        $hCouponStatus = $_POST['hCouponStatus'];
        // Set Using Cart DB
        $grand_price=0;
        $order_items = array();
        $order_status = "Initiated";
        date_default_timezone_set('Asia/Kolkata'); 
        $order_time =  date('h:i a m/d/Y', strtotime("now"));
        // Fetched Data From Cart
        $sql = "SELECT CONCAT(`product_name`,'(', `quantity`,')') AS `ItemQty`,`product_price`,`product_name`,`quantity`,`product_id` FROM `cart` WHERE `user_id`='$hUserId'";
        $res = mysqli_query($conn, $sql);
       if(mysqli_num_rows($res)>0){
        $all_item_n_price = mysqli_fetch_all($res, MYSQLI_ASSOC);
        // print_r($all_item_n_price);
       foreach ($all_item_n_price as $all_price) {

    //Total Price of All Products i.e grand Price
          $grand_price += $all_price['product_price'];
          array_push($order_items, $all_price['ItemQty'] ." ");
       }
       if ($hCouponStatus === "yes") {
           $grand_price *= 0.9;
       }
       $subtoatl = $grand_price;
       if($grand_price < 500){
           $shipping = 60;
           $grand_price += 60;
       }
    //    All items in String Format
       $all_ordered_items = implode(", ", $order_items);
    //    echo $all_ordered_items;
    //    echo $grand_price;
    //    Insert Into Order Table
       $grand_price = round($grand_price,0);
       $sql_to_insert_order_data = "INSERT INTO `orders`(`name`, `email`, `zip_code`, `address`, `phone`, `payment_mode`, `products`, `order_time`, `user_id`,`order_status`,`payment`) 
                                    VALUES ('$c_name','$c_email','$c_zip','$c_address','$c_phone','$payment_mode','$all_ordered_items','$order_time','$hUserId','$order_status', '$grand_price')";
       $result_insert_data = mysqli_query($conn, $sql_to_insert_order_data);

       if($result_insert_data)
       {
        
        $sql_to_get_order_id = "SELECT `id` FROM `orders` WHERE `user_id` = '$hUserId' ORDER BY id DESC LIMIT 0, 1";
        $order_id_querry = mysqli_query($conn, $sql_to_get_order_id);
        $order_id = mysqli_fetch_all($order_id_querry, MYSQLI_ASSOC);
        
        // Insert Into Inventory DB
        foreach ($all_item_n_price as $all_order_items) {
          $inventory_order_id = $order_id[0]['id'];
          $inventory_item_id = $all_order_items['product_id'];
          $inventory_item_qty = $all_order_items['quantity'];
          $sql_to_insert_in_inventory = "INSERT INTO `inventory_management`(`order_id`, `product_id`, `product_quantity`) VALUES ('$inventory_order_id','$inventory_item_id','$inventory_item_qty')";
          $insert_to_inventory = mysqli_query($conn, $sql_to_insert_in_inventory);
        }

    $to = $c_email;
    $subject = 'Order Successful';
    $from = 'orders@organicutpanna.in';
        
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    
    
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<div style="border: 1px solid rgb(92, 92, 92); box-sizing: border-box; border-top: 4px solid limegreen; border-radius: 10px; padding: 12px; background: rgb(233, 248, 248);">
                <img style="width:200px;" src="https://organicutpanna.in/assests/img/logo.png" alt="logo"/>
                <h2>THANK YOU FOR YOUR ORDER FROM <span style="color: limegreen; margin-bottom: 10px; font-weight: 700; margin-bottom: 10px;">ORGANIC UTPANNA</span></h2>
                <p>For Any Order Related Query: <a href="mailto:orders.farmerspure@gmail.com">orders.farmerspure@gmail.com</a></p>
            </div>
            <div style="margin-top: 30px;">
                <h3 style="text-align: center;">Order Details</h3>
                    <table style="width:100%; margin-top: 20PX; padding: 10px 0px; border: 2px solid rgb(39, 39, 39);">
                    <tr style="padding: 10px 0px; background: rgb(230, 230, 230); color: rgb(0, 0, 0); font-weight: 600;">
                      <th style="padding: 5px 8px;">Name</th>
                      <th style="padding: 5px 8px;">'.$c_name.'</th>
                    </tr>
                    <tr style="background: rgb(236, 236, 236);">
                      <td style="padding: 5px 8px;">Email</td>
                      <td style="padding: 5px 8px;">'.$c_email.'</td>
                    </tr>
                    <tr style="background: rgb(236, 236, 236);">
                      <td style="padding: 5px 8px;">Phone</td>
                      <td style="padding: 5px 8px;">'.$c_phone.'</td>
                    </tr>
                    <tr style="background: rgb(236, 236, 236);">
                      <td style="padding: 5px 8px;">Address</td>
                      <td style="padding: 5px 8px;">'.$c_address.'</td>
                    </tr>
                    <tr style="background: rgb(236, 236, 236); ">
                      <td style="padding: 5px 8px;">Pin</td>
                      <td style="padding: 5px 8px;">'.$c_zip.'</td>
                  </table>
            <div style="margin-top: 30px;">
                <h3 style="text-align: center;">Order Id:'.$order_id[0]['id'].'</h3>
                <table style="width:100%; margin-top: 20PX; padding: 10px 0px; border: 2px solid black;">
                    <tr style="padding: 10px 0px; background: rgb(31, 31, 31); color: white;">
                      <th style="padding: 5px 8px;">Item</th>
                      <th style="padding: 5px 8px;">Qty</th>
                      <th style="padding: 5px 8px;">Price</th>
                    </tr>';
    foreach ($all_item_n_price as $all_items) { 
    $message .= '<tr style="background: rgb(236, 236, 236); ">
                        <td style="padding: 5px 8px;">'.$all_items['product_name'] .'</td>
                        <td style="padding: 5px 8px;">'.$all_items['quantity'] .'</td>
                        <td style="padding: 5px 8px;">'.$all_items['product_price'] .'</td>
                      </tr>';
    }
    $message .= '<tr>
                      <td style="padding: 5px 8px;"></td>
                      <td style="padding: 5px 8px;">Sub Total</td>
                      <td style="padding: 5px 8px;">'.$subtoatl.'</td>
                    </tr>
                    <tr>
                      <td style="padding: 5px 8px;"></td>
                      <td style="padding: 5px 8px;">Shipping</td>
                      <td style="padding: 5px 8px;">'.$shipping.'</td>
                    </tr>
                    <tr style="color: rgb(190, 39, 39); font-weight: 600;">
                      <td style="padding: 5px 8px;"></td>
                      <td style="padding: 5px 8px;">Grand Total</td>
                      <td style="padding: 5px 8px;">'.$grand_price.'</td>
                    </tr>
                  </table>
            </div>';
    $message .= '</body></html>';
    
    mail($to, $subject, $message, $headers);
    
    // SMS Integration

        if(strlen((string)$c_phone)===10) {    
        $textMessage="Order Placed: Thanks For Shopping With Organic Utpanna. Your Order With Order Id #".$order_id[0]['id']." is Successful.";
        $mobileNumber=$c_phone;

        $apiKey = urlencode('OqCZYS4YHXI-RLNWp4Zj9ntCksrYNsuuWOQPIky9Z5');
        
        // Message details
        $numbers = array($mobileNumber);
        $sender = urlencode('TXTLCL');
        $message = rawurlencode($textMessage);

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);   
    }   



        //    echo '<script>alert("Order Successful")</script>';
          $sql_to_clear_cart= "DELETE FROM `cart` WHERE `user_id`='$hUserId'";
          $result_of_clear_cart = mysqli_query($conn, $sql_to_clear_cart);
        header("Location: ../order-success.php");
       }
       else{
           echo '<script>alert("Order Unsuccessful")</script>';
       }
    }
    else{
        header("Location: ../checkout.php?err=Nothing Available In Cart");
    }
    }
if(isset($_SESSION['userId'])){
    $user_id= $_SESSION['userId'];
    $sql_to_show_orders_to_user= "SELECT * FROM `orders` where `user_id`='$user_id'";
    $get_all_db_order_by_user = mysqli_query($conn, $sql_to_show_orders_to_user);
    $all_user_orders = mysqli_fetch_all($get_all_db_order_by_user, MYSQLI_ASSOC);
    // print_r($all_user_orders);
}
else{
    "Location: login.php?error=Log In To See Your Orders";
}
?>