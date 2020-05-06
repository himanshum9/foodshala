<?php include 'header.php';
 include 'controller/function.php';


if (isset($_SESSION['restaurant'])) {
  header("location:page_403.php");
}
if (!isset($_SESSION['user'])) {
  header('location:login.php');
}
if (isset($_GET['F_ID']) && isset($_GET['quantity'])) {
   $obj = new DB_con();
   $data = $obj->get_particular_food_item($_GET['F_ID']);
   $total = $_GET['quantity']*$data['price'];
}
else{
  header("location:shop.php");
}

  ?>

    <div class="alertMsg" id="msg" style=" display:none;height:50px;width:100%; position: fixed; top: 0; left: 0; z-index: 999"></div>
		
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Food Item</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(<?php echo $data['images_path']?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $data['name']; ?></h3>
						        </td>
						        
						        <td class="price">Rs.<?php echo $data['price'];?></td>
						        
						        <td class="quantity">
						        	<!-- <div class="input-group mb-3"> -->
					             	<?php echo $_GET['quantity']; ?>
					          	<!-- </div> -->
					          </td>
						        
						        <td class="total">Rs.<?php echo $total; ?></td>
						      </tr>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rs.<?php echo $total; ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>Rs.30</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rs.<?php echo ($total+30); ?></span>
    					</p>
              <!-- <input type="hidden" name="total" value="<?php echo $total; ?>"> -->
    				</div>
    				<p class="text-center"><a href="" id="bill" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            <div id="msg" class="alert " style="display: none;">
              </div>
    			</div>
    		</div>
			</div>
		</section>
    <?php include 'footer.php'?>
    <script type="text/javascript">
      $(document).ready(function(e){
        $("#bill").click(function(e){
          e.preventDefault();
          var rest_id = "<?php echo $data['R_ID']; ?>";
          var total = "<?php echo $total; ?>";
          var f_ID = "<?php echo $_GET['F_ID']; ?>";
          var quantity = "<?php echo $_GET['quantity'];?>";
          $.ajax({
        type: "POST",
        url: "controller/orders.php",
        data: {'rest_id':rest_id,'total':total,'f_ID':f_ID,'quantity':quantity},
        dataType: "json",
        success: function(result){
            if (result.status=='success') {
            $('#msg').addClass('alert alert-success offset4 span4').html(result.msg).fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 2000);
            setTimeout(function() {
            window.location = 'index.php';
             }, 2000);
        }
        else{
             $('#msg').addClass('alert alert-danger offset4 span4').html(result.msg).fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
        }
        }
        });

      });
      });
    </script>