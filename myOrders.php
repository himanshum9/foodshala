<?php include 'header.php'?>
<?php include 'controller/function.php'?>
<?php
$obj = new DB_con();
// echo "<pre>";
// print_r($_SESSION);
// die;
$datas = $obj->get_users_orders($_SESSION['user']['id']);
// echo "<pre>";
// print_r($datas);
?>
<div class="hero-wrap hero-bread" style="background-image: url('images/carli-jeen-UWRqlJcDCXA-unsplash.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p style="font-size:50px;">Your Orders</p>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
    	 <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Image</th>
            <th>Restaurant Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datas as $data) {?>
        <tr>
          <td><?php echo $data['name']; ?></td>
          <td><img src="<?php echo $data['image'];?>" alt="img" border=3 height=100 width=100></img></td>
          <td><?php echo $data['rest_name']; ?></td>
          <td>Rs <?php echo $data['price']; ?></td>
          <td><?php echo $data['quantity']; ?></td>
          <td><?php echo $data['order_date']; ?></td>
        </tr>
      <?php
    }
      ?>
    </tbody>
</table>
</div>
    </section>

   

    <?php include "footer.php"; ?>
  <script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').dataTable({
      scrollY: 400
      });
} );
</script>