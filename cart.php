<script>
function myFunction(e) {
   $.ajax({
        type: "POST",
        url: "controller/addToCart.php",
        data: {'f_ID':e,'action':'remove'},
        dataType: "json",
        success: function(result){
            if (result.status=='success') {
            $('#modal-body').html(result.msg);
            $("#myModal").modal("show");
            location.reload();
            
        }
        else{
             $('#msg').addClass('alert alert-danger offset4 span4').html("Something is not Right!!").fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
        }
        }
        });
}
</script>
<?php include 'header.php';
 include 'controller/function.php';


if (isset($_SESSION['restaurant'])) {
  header("location:page_403.php");
}
if (!isset($_SESSION['user'])) {
  header('location:login.php');
}

else if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

  $total =0;
  $obj = new DB_con();
  foreach ($_SESSION['cart'] as $key => $value) {
    $result[$key] = $obj->get_particular_food_item($value['f_ID']);
     $datas = $value['quantity'];
   array_push($result[$key],$datas);
   
  }
}
else{
  //header("location:shop.php");
?>
<div class="container space-2 space-md-2">
      <div class="w-md-80 w-lg-50 text-center mx-md-auto">
        <figure id="iconEmptyCart" class="ie-height-111 max-width-15 mx-auto mb-3" style="">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-280 -150 700 300" style="enable-background:new 0 0 10 10;"  class="injected-svg js-svg-injector" data-parent="#iconEmptyCart">
<style type="text/css">
  .icon-66-0{fill:none;stroke:#BDC5D1;}
  .icon-66-1{fill:#377DFF;}
  .icon-66-2{fill:#FFFFFF;}
  .icon-66-3{fill:#BDC5D1;}
</style>
<polygon class="icon-66-0 fill-none stroke-gray-400" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="102.6,89.5 42.8,89.5 17.7,32.1 2.1,32.1 2.1,24.9 22.4,24.9 47.5,82.3 102.6,82.3 "></polygon>
<path class="icon-66-1 fill-primary" d="M66.7,107.4c0,5.9-4.8,10.8-10.8,10.8s-10.8-4.8-10.8-10.8S50,96.7,55.9,96.7S66.7,101.5,66.7,107.4z"></path>
<path class="icon-66-1 fill-primary" d="M102.6,107.4c0,5.9-4.8,10.8-10.8,10.8S81,113.4,81,107.4s4.8-10.8,10.8-10.8S102.6,101.5,102.6,107.4z"></path>
<path class="icon-66-2 fill-white" d="M95.1,107.4c0,1.8-1.5,3.3-3.3,3.3s-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3S95.1,105.6,95.1,107.4z"></path>
<path class="icon-66-2 fill-white" d="M59.2,107.4c0,1.8-1.5,3.3-3.3,3.3c-1.8,0-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3C57.7,104.2,59.2,105.6,59.2,107.4z"></path>
<circle class="icon-66-3 fill-gray-40" opacity=".5" cx="15.1" cy="30.3" r="10.9"></circle>
<circle class="icon-66-2 fill-white" opacity=".5" cx="91.8" cy="26.9" r="24.9"></circle>
<path class="icon-66-1 fill-primary" d="M91.8,1.8C77.9,1.8,66.7,13,66.7,26.9S77.9,52,91.8,52s25.1-11.2,25.1-25.1S105.7,1.8,91.8,1.8z M104.5,34.5  l-5.1,5.1L91.8,32l-7.6,7.6l-5.1-5.1l7.6-7.6l-7.6-7.6l5.1-5.1l7.6,7.6l7.6-7.6l5.1,5.1l-7.6,7.6L104.5,34.5z"></path>
<path class="icon-66-3 fill-gray-400" d="M91.8,60.8c-13.7,0-25.4-8.7-30-20.8c-0.2-0.4-0.6-0.7-1-0.7H39.6c-0.8,0-1.3,0.8-1,1.5L52,74.4  c0.2,0.4,0.6,0.7,1,0.7h48.7c0.5,0,0.9-0.3,1-0.7l6.7-16.7c0.4-1-0.7-1.9-1.6-1.4C103.2,59.2,97.7,60.8,91.8,60.8z"></path>
</svg>
        </figure>
        <div class="mb-5">
          <h1 class="h3 font-weight-medium">Your cart is currently empty</h1>
          <p>Before proceed to checkout you must add some Items to your shopping cart.</p>
        </div>
        <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="shop.php">Add Items</a>
        <br>
      </div>
    </div>
    <?php
     include 'footer.php';
    die;

}

  ?>

    <div class="alertMsg" id="msg" style=" display:none;height:50px;width:100%; position: fixed; top: 0; left: 0; z-index: 999"></div>
		
		<div class="hero-wrap hero-bread" style="background-image: url('images/jakub-kapusnak-sDbj1dFlFPU-unsplash.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
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
                  <?php
                  foreach ($result as $key => $data) {
                    $total += $data['price']*$data[6];
                    ?>
                     <tr class="text-center">
                    <td class="product-remove">
                      <button class="close" onclick="myFunction(<?php echo $data['F_ID'] ?>);" data-set = "<?php echo $data['F_ID'] ?>" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </td>
                    
                    <td class="image-prod"><div class="img" style="background-image:url(<?php echo $data['images_path']?>);"></div></td>
                    
                    <td class="product-name">
                      <h3><?php echo $data['name']; ?></h3>
                    </td>
                    
                    <td class="price">Rs.<?php echo $data['price'];?></td>
                    
                    <td class="quantity">
                      <!-- <div class="input-group mb-3"> -->
                        <?php echo $data[6]; ?>
                      <!-- </div> -->
                    </td>
                    
                    <td class="total">Rs.<?php echo $data['price']*$data[6]; ?></td>
                  </tr>
                  <?php }
                  ?>
						     
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
    						<span>Rs.<?php echo $total ?></span>
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
    				<p class="text-center"><a href="#" id="bill" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            <div id="msg" class="alert " style="display: none;">
              </div>
    			</div>
    		</div>
			</div>
		</section>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id ="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <?php include 'footer.php'?>
    <script type="text/javascript">
      $(document).ready(function(e){
        $("#bill").click(function(e){
          e.preventDefault();
          var total = "<?php echo $total; ?>";
          var ordersArray = <?php echo json_encode($result); ?>;
          console.log(ordersArray);
          $.ajax({
        type: "POST",
        url: "controller/orders.php",
        data: {'ordersArray':ordersArray,'total':total},
        dataType: "json",
        success: function(result){
            if (result.status=='success') {
            $('#msg').addClass('alert alert-success offset4 span4').html(result.msg).fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 2000);
            setTimeout(function() {
            window.location = 'myOrders.php';
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