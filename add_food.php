<?php include 'header.php';
      include 'controller/function.php';
  if ($_SESSION['user']['user_role']==1) {
    header('location:page_403.php');
    }
  if ($_SESSION['user']['user_role']!=2) {
    header('location:login.php');
  }?>
		<div class="hero-wrap hero-bread" style="background-image: url('images/zhang-kaiyv-pJi7nQ2Ni1s-unsplash.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h2 class="mb-0 bread" style="color: white;"><b>Add Food Items</b></h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
    <div class="col-md-3" style="text-align: center;margin-top: 100px;">

      <div class="list-group">
        <a href="restaurant_view.php" class="list-group-item ">My Restaurant</a>
        <a href="restaurant_items.php" class="list-group-item ">View Food Items</a>
        <a href="add_food.php" class="list-group-item active">Add Food Items</a>
        <a href="view_orders.php" class="list-group-item ">View Orders</a>
      </div>
    </div>

    <div class="col-md-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form name="add-food" id="add-food" method="POST" enctype="multipart/form-data">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW FOOD ITEM HERE </h3>

          <div class="form-group">
            <label class="col-form-label"  for="name">Name</label><span class="required">*</span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Food name" required="">
          </div>     

          <div class="form-group">
            <label class="col-form-label"  for="name">Price</label><span class="required">*</span>
            <input type="number" class="form-control" id="price" name="price" placeholder="Your Food Price (INR)" required="">
          </div>

          <div class="form-group">
            <label class="col-form-label"  for="name">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Your Food Description" required="">
          </div>
          <div class="form-group">
                <label class="col-form-label"  for="name">Food type</label><span class="required">*</span>
              <select class="form-control" id="vegan" name="vegan">
              <option value="">Please Select</option>
              <option value="1">Veg</option>
              <option value="2">Non-veg</option>
              </select>
              </div>

          <div class="form-group">
            <label class="col-form-label"  for="name">Upload Image</label>
            <input type="file" class="form-control" id="file" name="file" required="false">
          </div>
          <input type="hidden" name="string" value="save">  
          <div id="msg" class="alert " style="display: none;">
              </div>
          <div class="form-group">
          <input type="submit" id="submit" name="submit" value="ADD Item" class="btn btn-primary pull-right">
        </div>
            
        </form>

        
        </div>
      
    </div>
    </div>
  </div>
<?php include "footer.php"; ?>
<script type="text/javascript">


  $(document).ready(function(){
    $("#add-food").on('submit',(function(e) {
        var name = $("#name").val();
        var price = $("#price").val();
        var description = $("#description").val();
        var vegan = $("#vegan").val();
        var formData = new FormData(this);

        if(name==''||price==''||vegan=='')
        {
        $('#msg').addClass('alert-danger').html("Please Fill the required fields").fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
        }
        else
        {
        $.ajax({
        type: "POST",
        processData: false,
        contentType: false,
        url: "controller/Items.php",
        data: formData,
        dataType: "json",
        success: function(result){
            if (result.status=='success') {
            $('#msg').addClass('alert-success').html(result.msg).fadeIn('slow');
            $("#add-food")[0].reset();
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
        }
        else{
             $('#msg').addClass('alert-danger').html(result.msg).fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
        }
        }
        });
        }
        return false;
    })
  )})
</script>