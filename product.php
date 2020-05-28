<?php include 'header.php'?>
<?php include 'controller/function.php'?>
<?php
    $obj= new DB_con();
    // echo "<pre>";
    // print_r($_GET);
    // die;
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $obj->get_particular_food_item($id);
    if(empty($data)){
      header('location:404.php');
    }
} else {
    header('location:404.php');
    die;
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
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 ftco-animate">
            <a href="<?php echo $data['images_path'] ?>" class="image-popup"><img src="<?php echo $data['images_path'] ?>" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-lg-6 product-details pl-md-5 ftco-animate">
            <h3><?php echo $data['name']; ?></h3>
            <p class="price"><span>Rs. <?php echo $data['price']; ?></span></p>
            <p> <?php echo $data['description']; ?>
            </p>
            <?php
                  if(!isset($_SESSION['restaurant']))
                  {
                ?>
            <div class="row mt-4">
              <div class="col-md-6">
                <div class="form-group d-flex">
                </div>
              </div>
              <div class="w-100"></div>
              <div class="input-group col-md-6 d-flex mb-3">
                <span class="input-group-btn mr-2">
                    <button type="button" class="quantity-left-minus btn btn-minus"  data-type="minus" data-field="">
                     <i class="fa fa-arrow-left"></i>
                    </button>
                  </span>
                <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="5">
                <span class="input-group-btn ml-2">
                    <button type="button" class="quantity-right-plus btn btn-plus" data-type="plus" data-field="">
                       <i class="fas fa-chevron-left fa fa-arrow-right"></i>
                   </button>
                </span>
              </div>
            </div>
             <a href = "javascript:;"><button type="button" style="margin-top:5px; color: black;" data-set = "<?php echo $data['F_ID'] ?>" class="orderNow">Order Now</button></a>
             <a href = "javascript:;"><button class="addToCart" type="button" name="add" data-set = "<?php echo $data['F_ID'] ?>" style="margin-top:5px;margin-left: 40px; color: black;"><?php echo  (isset($_SESSION['cart']) && array_search($data['F_ID'], array_column($_SESSION['cart'], 'f_ID')) !== FALSE) ? "Item Added":"Add to Cart" ?></button></a>
             <?php
                }
            ?> 
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
          var quantity = $(this).parent().parent().find('.input-number').val();
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
          var quantity = $(this).parent().parent().find('.input-number').val();
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
