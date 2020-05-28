<?php include 'header.php';
 include 'controller/function.php';
if ($_SESSION['user']['user_role']==1) {
    header('location:page_403.php');
  }

if ($_SESSION['user']['user_role']!=2) {
  header('location:login.php');
}
$obj = new DB_con();
$data = $obj->get_restaurant_detail_by_id($_SESSION['user']['id']);
?>

		<div class="hero-wrap hero-bread" style="background-image: url('images/zhang-kaiyv-pJi7nQ2Ni1s-unsplash.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" style="color: white;"><b>Resraurant Profile</b></h1>
            <!-- <p style="font-size:50px;">Your Orders</p> -->
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
    <div class="col-md-3" style="text-align: center;margin-top: 100px;">

      <div class="list-group bmd-list-group-sm">
        <a href="restaurant_view.php" class="list-group-item active" style = "background-color:#053238;">My Restaurant</a>
        <a href="restaurant_items.php" class="list-group-item ">View/Edit Food Items</a>
        <a href="add_food.php" class="list-group-item ">Add Food Items</a>
        <a href="view_orders.php" class="list-group-item ">View Orders</a>
      </div>
    </div>

    <div class="col-md-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form name="details" id="details" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> MY RESTAURANT</h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Restaurant's Name" required="" value="<?php echo $data['name']; ?>">
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Your Restaurant's Email" value="<?php echo $data['email']; ?>">
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Your Restaurant's Contact Number" value="<?php echo $data['contact']; ?>">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="address" name="address" placeholder="Your Restaurant's Address" value="<?php echo $data['address']; ?>">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Update </button>    
      </div>
        </form>

        
        </div>
      
    </div>
    </div>
  </div>
<?php include 'footer.php'?>

<script type="text/javascript">


  $(document).ready(function(){
    $("#details").on('submit',(function(e) {
      e.preventDefault();
        var name = $("#name").val();

        if(name=='')
        {
        $('#msg').addClass('alert-danger').html("Please Fill the required fields").fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
        }
        else
        {
        var data = $('#details').serializeArray();
        //console.log(data);
        $.ajax({
        type: "POST",
        url: "controller/details.php",
        data: data,
        dataType: "json",
        success: function(result){
            if (result.status=='success') {
            $('#msg').addClass('alert-success').html(result.msg).fadeIn('slow');
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
