<?php include 'header.php';
      include 'controller/function.php';
      if ($_SESSION['user']['user_role']==1) {
      header('location:page_403.php');
    }
    if ($_SESSION['user']['user_role']!=2) {
      header('location:login.php');
    }
    $obj= new DB_con();
    $rest_id = $_SESSION['restaurant']['id'];
    $datas=$obj->get_restaurant_orders($rest_id);

?>
		<div class="hero-wrap hero-bread" style="background-image: url('images/zhang-kaiyv-pJi7nQ2Ni1s-unsplash.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" style="color: white;">Orders History</h1>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
    <div class="col-md-3" style="text-align: center;margin-top: 100px;">

      <div class="list-group">
        <a href="restaurant_view.php" class="list-group-item ">My Restaurant</a>
        <a href="restaurant_items.php" class="list-group-item ">View/Edit Food Items</a>
        <a href="add_food.php" class="list-group-item ">Add Food Items</a>
        <a href="view_orders.php" class="list-group-item active" style = "background-color:#053238;">View Orders</a>
      </div>
    </div>


    <div class="col-md-9">
      <div class="form-area" style="padding: 50px 100px 100px 100px;">
      <table id="table_id" class="display cell-border">
    <thead>
        <tr>
            <th>Username</th>
            <th>Item</th>
            <th>quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Order Date</th>

        </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datas as $data) {?>
        <tr>
          <td><?php echo $data['username']; ?></td>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['quantity']; ?></td>
          <td>Rs <?php echo $data['price']; ?></td>
          <td>Rs <?php echo ($data['price']*$data['quantity']); ?></td>
          <td><?php echo $data['order_date']; ?></td>
        </tr>
      <?php
    }
      ?>
    </tbody>
</table>
</div>
</div>
    </div>
  </div>

  <?php include "footer.php"; ?>
  <script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').dataTable({
      scrollY: 400
      });
} );
</script>