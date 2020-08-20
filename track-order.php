<?php include('./views/header.php');
$orderid = $_GET['order'];
$status = $_GET['status'];
echo '<h2 id="statusRes" class="d-none">'.$status.'</h2>'
?>

<section class="order-anim">
<h2 class="text-center order-status-head">Order Status</h2>
        <ul>
            <li id="0" >Initiated <span>Date Time</span></li>
            <li id="1" >Dispatched <span>Dispatched From Bhubaneswar</span></li>
            <li id="2" >Shipped <span>Shipped at 12.00Am at your nearest Location</span></li>
            <li id="3">Delivery <span>Expected Delivery <b>12.03.2020</b></span></li>
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