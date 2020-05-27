<?php include 'header.php'?>
<?php include 'controller/function.php'?>
<?php
    $obj= new DB_con();
    if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
  $allowedlimit = 25;
  $params['rec_per_page']=$no_of_records_per_page = 12;
  $params['offset'] =$offset = ($page-1) * $no_of_records_per_page;
  $total_records = $obj->count_all_items();
  $total_pages = ceil($total_records[0]/$params['rec_per_page']);
  if (isset($_SESSION['user'])) {
    $user = $obj->get_user_detail_by_id($_SESSION['user']['id']);
    $params['vegan'] = $user['vegan'];
    $datas=$obj->get_all_food_items_with_preference($params);
    $total_records = count($datas);
    $total_pages = ceil($total_records[0]/$params['rec_per_page']);
  }
  else{
  $datas=$obj->get_all_food_items($params);
  }
?>
		<div class="hero-wrap hero-bread" style="background-image: url('images/deva-williamson-K2ZFPgTjMDI-unsplash.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p style="font-size:50px;color: black;">Get Your Food</p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section bg-light">
    	<div class="container-fluid">
    		<div class="row">
          <?php
          foreach ($datas as $data) {
          ?>
    			<div class="col-sm col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<img class="img-fluid img-prod hight" src="<?php echo $data['images_path']?>" alt="">
    					<div class="text py-3 px-3">
                <h3><a href="product.php?id=<?php echo $data['F_ID']; ?>"><?php echo $data['foodname']; ?></a></h3>
    						<h6><b><?php echo $data['rest_name']; ?></b></h6>
                <h6><a href="product.php?id=<?php echo $data['F_ID']; ?>"><?php echo (mb_strlen($data['description'])>$allowedlimit) ? mb_substr($data['description'],0,$allowedlimit)."..." : $data['description'] ?></a></h6>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">Rs <?php echo $data['price']; ?></span></p>
		    					</div>
                  
	    					</div>
                
                  <?php if(isset($_SESSION['restaurant']) && $_SESSION['user']['user_role']==2){?>
                  <?php } else{ ?>
                    <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="form-group d-flex">
                        </div>
                      </div>
                      <div class="w-100"></div>
                        <div class="input-group col-md-8 d-flex">
                          <span class="input-group-btn mr-2">
                              <button type="button" class="quantity-left-minus btn btn-minus"  data-type="minus" data-field="">
                               <i class="fa fa-arrow-left"></i>
                              </button>
                          </span>
                          <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="5" disabled></input>
                          <span class="input-group-btn ml-2">
                              <button type="button" class="quantity-right-plus btn btn-plus" data-type="plus" data-field="">
                                 <i class="fas fa-chevron-left fa fa-arrow-right"></i>
                             </button>
                          </span>
                        </div>
                    </div>
                    <!-- <h6 class="text-info"style="margin-left: 93px;">Quantity: <input class="abc" type="number" id="quantity" min="1" max="5" name="quantity[]" class="form-control" value="1" style="width: 60px;"> </h6> -->
                <hr>
                <p class="bottom-area d-flex">
                  <a href = "javascript:;"><button type="button" style="margin-top:5px;" data-set = "<?php echo $data['F_ID'] ?>" class="orderNow btn btn-info">Order Now</button></a>
                   <a href = "javascript:;" onclick = ""><button class="addToCart btn peach-gradient" type="button" name="add" data-set = "<?php echo $data['F_ID'] ?>" style="margin-top:5px;margin-left: 40px;" class="btn btn-info"><?php echo  (isset($_SESSION['cart']) && array_search($data['F_ID'], array_column($_SESSION['cart'], 'f_ID')) !== FALSE) ? "Item Added":"Add to Cart" ?></button></a>
                  </p>
                <?php } ?>
    						
    					</div>
    				</div>
    			</div>
        <?php }?>
    		</div>
        <!-- <input type="hidden" name="count" id = 'count' value="<?php echo $_SESSION[''] ?>"> -->
        <div class="row mt-5">
           <div class="col text-center">
            <div class="block-27">
            <?php
            $pagLink = "<ul>";  
            for ($i=1; $i<=$total_pages; $i++) {
             $pagLink .= "<li class='text-center'><a class='' href='shop.php?page=".$i."'>".$i."</a></li>"; 
            }
            echo $pagLink . "</ul>";  
            ?>
        </div>
        </div>
          </div>
    	</div>
    </section>
    <!-- Modal -->
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
      <script>

  $(document).ready(function(){
    $('.btn-plus, .btn-minus').on('click', function(e) {
    const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
    const input = $(e.target).closest('.input-group').find('input');
    console.log(input[0]);
    if (input.is('input')) {
    input[0][isNegative ? 'stepDown' : 'stepUp']()
    }
    });
    $(".addToCart").click(function(e){
       e.preventDefault();
          var f_ID = $(this).attr("data-set");
          console.log(f_ID);
          var quantity = $(this).parent().parent().parent().find('.input-number').val();
          console.log(quantity);
          $.ajax({
        type: "POST",
        url: "controller/addToCart.php",
        data: {'f_ID':f_ID,'quantity':quantity,'action':'add'},
        dataType: "json",
        success: function(result){
            if (result.status=='success') {
            $('#modal-body').html(result.msg);
            $("#myModal").modal("show");
            const button = e.target.closest('.addToCart');
            button.innerHTML = "Item Added";
            const count = document.querySelector('#aaa');
            count.innerHTML = result.count;
        }
        else if (result.status=='error'){
            $('#modal-body').html(result.msg);
            $("#myModal").modal("show");
        }
        else{
           window.location='login.php';
        }
        }
        });
    });
    $(".orderNow").click(function(e){
       e.preventDefault();
          var f_ID = $(this).attr("data-set");
          console.log(f_ID);
          var quantity = $(this).parent().parent().parent().find('.input-number').val();
          console.log(quantity);
          $.ajax({
        type: "POST",
        url: "controller/addToCart.php",
        data: {'f_ID':f_ID,'quantity':quantity,'action':'order'},
        dataType: "json",
        success: function(result){
            if (result.status=='success') {
              window.location='cart.php';
            
        }
        else{
              window.location='login.php';
        }
        }
        });
    });
  });
  </script>
