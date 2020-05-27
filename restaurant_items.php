<?php include 'header.php';
      include 'controller/function.php';
       if ($_SESSION['user']['user_role']==1) {
      header('location:page_403.php');
    }
    if ($_SESSION['user']['user_role']!=2) {
      header('location:login.php');
    }
?>
		<div class="hero-wrap hero-bread" style="background-image: url('images/zhang-kaiyv-pJi7nQ2Ni1s-unsplash.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" style="color: white;">Food Items</h1>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
    <div class="col-md-3" style="text-align: center;margin-top: 100px;">

      <div class="list-group">
        <a href="restaurant_view.php" class="list-group-item ">My Restaurant</a>
        <a href="restaurant_items.php" class="list-group-item active">View Food Items</a>
        <a href="add_food.php" class="list-group-item ">Add Food Items</a>
        <a href="view_orders.php" class="list-group-item ">View Orders</a>
      </div>
    </div>

    <div class="col-md-9">
      <div class="form-area" style="padding: 50px 100px 100px 100px;">
      <table id="user_data" class="display cell-border">
     <thead>
      <tr>
       <th>Name</th>
       <th>Price</th>
       <th>Description</th>
       <th>Vegan</th>
       <th>Status</th>
      </tr>
     </thead>
    </table>


</div>
</div>
    </div>
  </div>

  <?php include "footer.php"; ?>
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "language": {                
      "infoFiltered": ""
    },
    "order" : [],
    "ajax" : {
     url:"controller/fetch.php",
     type:"POST"
    }
   });
  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"controller/update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#msg').addClass('alert alert-success offset4 span4').html("Field Value Changed SuccessFully!!").fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 2000);
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var preValue = $(this).attr("prevvalue");

   var column_name = $(this).data("column");
   var value = $(this).text();
   if (preValue == value) {
    return false;
   }
   console.log(id);
   console.log(column_name);
   console.log(value);
    update_data(id, column_name, value);
  });
  
  $(document).on('click', '.status', function(){
   var id = $(this).attr("id");
   var column_name = $(this).data("column");
   var value = $(this).attr("data-set");
    var value = (value == 1 ? 0 : 1);
   console.log(value);
    $.ajax({
     url:"controller/update.php",
     method:"POST",
     data:{id:id, column_name:column_name, value:value},
     success:function(data){
      $('#msg').addClass('alert alert-success offset4 span4').html("Status Changed SuccessFully!!").fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 2000);
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
  });
 });
</script>
    