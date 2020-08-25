<?php include('./views/header.php');
$orderid = $_GET['order'];
$status = $_GET['status'];
echo '<h2 id="statusRes" class="d-none">'.$status.'</h2>'
?>

<section class="order-anim">
<h2 class="text-center order-status-head">Order Status</h2>
        <ul>
            <li id="0" >Initiated <span>Order Initiated Successfully</span></li>
            <li id="1" >Dispatched <span><?php echo $_GET['shippedMsg'] === "" ? "" : $_GET['shippedMsg'] ?></span></li>
            <li id="2" >Shipped <span><?php echo $_GET['dispatchMsg'] === "" ? "" : $_GET['dispatchMsg'] ?></span></li>
            <li id="3">Delivery <span><?php echo $_GET['deliveryMsg'] === "" ? "" : $_GET['deliveryMsg'] ?></span></li>
        </ul>
</section>
<script>

    let orderStatus= document.getElementById('statusRes').innerHTML.toLowerCase();
    console.log(orderStatus);
    if(orderStatus === "cancelation initiated" || orderStatus ==="canceled"){
        let allItems = document.querySelectorAll('.order-anim ul li');
       allItems.forEach(item => console.log(item.classList.add('deactive')))
       
    }
    else{
        let arr = ["initiated", "dispatched", "shipped", "delivered"];

        for (let i = 0; i < arr.length; i++) {
            
            if(orderStatus==arr[i]){
                document.getElementById(i).classList.add('active');
                break;
            }
            else{
                document.getElementById(i).classList.add('active');
            }
            
        }
        
    }
   
</script>

<?php include('./views/footer.php')  ?>