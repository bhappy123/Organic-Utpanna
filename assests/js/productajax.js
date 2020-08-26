$(document).ready(function () {
	
	function filter() {
		var category= $("#category").val();
		var locationFilter=$("#locationFilter").val();
		
		$.ajax({
			type: "POST",
			data: {
				category: category,
				locationFilter: locationFilter
			},
			url: "./controller/productCtrl.php",
			success: function (response) {
				let productsArr = JSON.parse(response);
				let htmlString = ``;
				let locationStock = locationFilter + '_stock';
				productsArr.forEach((product) => {
					htmlString += `
					<div class="col-md-3 each-product-outside">
						<div class="each-product-inside">
							<div class="each-product-img">
							<a href="product-detail.php?product=${product.id}">	<img src="./img/${product.item_image}" alt=""></a>
							</div>
							<div class="each-product-content">
							<a href="product-detail.php?product=${product.id}"><h2>${product.item_name}</h2></a>
								<h6>${product.size}</h6>
								<div class="row">
									<div class="col-md-4"><h4>${product.price}/-</h4></div>
									<div class="add-to-cart-form">
									<input type="hidden" class="pid" value="${product.id}">
									<input type="hidden" class="pname" value="${product.item_name}">
									<input type="hidden" class="pimage" value="./img/${product.item_image}">
									<input type="hidden" class="pprice" value="${product.price}">
									<input type="hidden" class="psize" value="${product.size}">
									<div class="col-md-8 float-right"><button class="cart-btn ${product[locationStock] > 5 ? 'add-to-cart' : ''}">${product[locationStock] > 5 ? 'Add To Cart' : 'Out Of Stock'}</button></div>
									</div>
								</div>
							</div>
						</div>
				</div> `;
				});
				$("#allProduct").html(htmlString);
				$(".add-to-cart").click(function(e) {

					e.preventDefault();
						var $form = $(this).closest(".add-to-cart-form");
						var pid = $form.find(".pid").val();
						var pname = $form.find(".pname").val();
						var pimage = $form.find(".pimage").val();
						var pprice = $form.find(".pprice").val();
						var psize = $form.find(".psize").val();
						$.ajax({
							type: "POST",
							data: {
								pid: pid,
								pname: pname,
								pimage: pimage,
								pprice: pprice,
								psize: psize,
							},
							url: "./controller/cartCtrl.php",
							success: function (response) {
								console.log(response);
								if (response === "login first") {
									window.location.href =
									"http://organicutpanna.in/login.php?error=Log In to use cart";
								}
								else if(response === "Item Added Successfully")
								$("#cart-message").html(
									'<div class="success-alert alert alert-light text-success"><div class="animation-ctn"><div class="icon icon--order-success svg"><svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px"><g fill="none" stroke="rgb(3, 153, 3)" stroke-width="2"><circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle><circle id="colored" fill="rgb(3, 153, 3)" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle><polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8 63.7,97.9 112.2,49.4 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"/></g></svg></div></div>' +
										response +
										"</div>"
								)
								else{
									$("#cart-message").html(
										'<div class="success-alert alert alert-light text-danger"><div class="animation-ctn"><div class="icon icon--order-success svg"><svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px"><g fill="none" stroke="#F44812" stroke-width="2"><circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle><circle id="colored" fill="#F44812" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle><polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8  112.2,77.8 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"/></g></svg></div></div>'+response+
											"</div>"
									)
								}
								$(".success-alert").fadeTo(500, 300).slideUp(500, function(){
									$(".success-alert").slideUp(500);
									location.reload(true);
								});
							},
						});
				});
			},
		});
	}
	function addToCart($form) {
		console.log($form)
		var pid = $form.find(".pid").val();
		var pname = $form.find(".pname").val();
		var pimage = $form.find(".pimage").val();
		var pprice = $form.find(".pprice").val();
		var psize = $form.find(".psize").val();
		console.log(pid);
		
		$.ajax({
			type: "POST",
			data: {
				pid: pid,
				pname: pname,
				pimage: pimage,
				pprice: pprice,
				psize: psize,
			},
			url: "./controller/cartCtrl.php",
			success: function (response) {
				
				if (response === "login first") {
					window.location.href =
					"http://organicutpanna.in/login.php?error=Log In to use cart";
				}
				else if(response === "Item Added Successfully")
				{
				console.log(response);
				$("#cart-message").html(
					'<div class="success-alert alert alert-light text-success"><div class="animation-ctn"><div class="icon icon--order-success svg"><svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px"><g fill="none" stroke="rgb(3, 153, 3)" stroke-width="2"><circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle><circle id="colored" fill="rgb(3, 153, 3)" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle><polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8 63.7,97.9 112.2,49.4 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"/></g></svg></div></div>' +
						response +
						"</div>",
						location.reload(true)
				)
				}
				else{
				console.log(response);
					
					$("#cart-message").html(
						'<div class="success-alert alert alert-light text-danger"><div class="animation-ctn"><div class="icon icon--order-success svg"><svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px"><g fill="none" stroke="#F44812" stroke-width="2"><circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle><circle id="colored" fill="#F44812" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle><polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8  112.2,77.8 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"/></g></svg></div></div>' +
							response +
							"</div>",
					)
				}
				$(".success-alert").fadeTo(1500, 300).slideUp(1500, function(){
					$(".success-alert").slideUp(1500);
					location.reload(true);
				});
			},
		});
	}
	// NOTE Filtering using Location

	$("#category").on("change", function () {
		// filter method by default provides 
		filter();
	});


	// NOTE Filtering using Location

	$("#locationFilter").on("change", function () {
		filter();
	});




	$(".pQuantity").change(function (e) {
		e.preventDefault();
		const $tr = $(this).closest("tr");
		const productQuantity = $tr.find(".pQuantity").val();
		const hCartItemId = $tr.find(".hCartItemId").val();
		const hCartUserId = $tr.find(".hCartUserId").val();
		const hCartItemPrice = $tr.find(".hCartItemPrice").val();
		const hCartItemMainPrice = $tr.find(".hCartItemMainPrice").val();
		const coupon = $('#coupon_code').val();
		$.ajax({
			type: "POST",
			url: "./controller/cartCtrl.php",
			data: {
				productQuantity: productQuantity,
				hCartItemId: hCartItemId,
				hCartUserId: hCartUserId,
				hCartItemPrice: hCartItemPrice,
				hCartItemMainPrice: hCartItemMainPrice,
				coupon: coupon
			},
			success: function (response) {
				location.reload(true);
			},
		});
	});
    $(".add-to-cart").click(function (e) {
    		e.preventDefault();
    		var $form = $(this).closest(".add-to-cart-form");
    
    		addToCart($form);
      });


  // Check File Name
  if (
	location.href==="http://localhost/Organic-Utpanna/"||
	location.href==="http://localhost/Organic-Utpanna/index.php" ||
	location.href==="http://localhost/Organic-Utpanna/index.php#" ||
	location.href==="http://localhost/Organic-Utpanna/#" ||
	location.href==="http://organicutpanna.in/" ||
	location.href==="http://organicutpanna.in/index.php"||
	location.href==="http://organicutpanna.in/#"||
	location.href==="http://organicutpanna.in/index.php#" ||
	location.href==="https://organicutpanna.in/" ||
	location.href==="https://organicutpanna.in/index.php"||
	location.href==="https://organicutpanna.in/#"||
	location.href==="https://organicutpanna.in/index.php#"
	) {    
  filter();
}



// Setting Location

	$('#location_submit').click(function (e) { 
		e.preventDefault();
		let location = $('#location_setter').val();
		console.log(location);
		$.ajax({
			type: "POST",
			url: "./controller/locationCtrl.php",
			data: {
				location: location
			},
			success: function (response) {
				console.log(response);
				$('.locationSet').css('display','none');
				document.location.reload(true);
			}
		});
	});

$('#coupon').change(function (e) { 
	e.preventDefault();
	let couponValue = $('#coupon').val();
	let grandTotal = parseInt($('#grandTotal').html());
	let discountPrice = Math.round(grandTotal * 0.9);

	let shipping = discountPrice > 500 ? 0 : 60;
	if(couponValue === "utp2020"){
		$('#grandTotal').html(discountPrice);
		$('#shipping').html(shipping);
		$('#fullPayment').html(discountPrice + shipping);
		$('.coupon-alert').html('<p class="text-success">Coupon Applied</p>');
		$('#couponOnlineApp').val('yes');
		$('#couponApp').val('yes');
	}
	else{
		$('#couponApp').val('no');
		$('.coupon-alert').html('<p class="text-danger">Not a Valid Coupon</p>');
		setTimeout(function() {
			location.reload();
		}, 2500);
	}

});

	// Search Control
	$('#search-box').keyup(function (e) { 
		let searchText = $('#search-box').val();
		if(searchText !== ''){
			$.ajax({
				type: "post",
				url: "./controller/searchCtrl.php",
				data: {query: searchText},
				success: function (response) {
					$("#searchResultContainer").html(response);
				}
			});
		}
		else{
			$("searchResultContainer").html('Type something');
		}
	});

});