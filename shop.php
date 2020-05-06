<?php include 'header.php'?>
<?php include 'controller/function.php'?>
<?php
    $obj= new DB_con();
    if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
  $allowedlimit = 55;
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
    // echo $total_records;
  }
  else{
  $datas=$obj->get_all_food_items($params);
  }
?>
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0">Get Your Food</h1>
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
                <h3><a href="#"><?php echo $data['foodname']; ?></a></h3>
    						<h6><?php echo $data['rest_name']; ?></h6>
                <h6><a href="#"><?php echo (mb_strlen($data['description'])>$allowedlimit) ? mb_substr($data['description'],0,$allowedlimit)."...." : $data['description'] ?></a></h6>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">Rs <?php echo $data['price']; ?></span></p>
		    					</div>
                  
	    					</div>
                
                  <?php if(isset($_SESSION['restaurant']) && $_SESSION['user']['user_role']==2){?>
                  <?php } else{ ?>
                    <h6 class="text-info"style="margin-left: 93px;">Quantity: <input class="abc" type="number" id="quantity" min="1" max="5" name="quantity[]" class="form-control" value="1" style="width: 60px;"> </h6>
                <hr>
                <p class="bottom-area d-flex">
                  <a href = "javascript:;" onclick = "this.href='cart.php?F_ID=<?php echo $data['F_ID']?>&quantity=' + $(this).parent().parent().find('.abc').val()"><button type="button" name="add" style="margin-top:5px;" class="btn btn-success">Order Now</button></a>
                  </p>
                <?php } ?>
    						
    					</div>
    				</div>
    			</div>
        <?php }?>
    		</div>
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
    <?php include 'footer.php'?>
