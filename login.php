  <?php include 'header.php';?>
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 text-center">
            <h1 class="mb-0 bread">Login</h1>
            <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form name="form-login" method="POST" class="bg-white p-5 contact-form">
              <div class="form-group">
                <label class="col-sm-2 col-form-label"  for="name">UserName</label>
                <input type="text" class="form-control"name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-form-label" for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <div id="msg" class="alert " style="display: none;">
              </div>
              <div class="form-group">
                <input type="button" id="login" value="Login" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
            <img class="img-fluid" src="images/Chocolate_Hazelnut_Truffle.jpg" alt="Colorlib Template">
          	<!-- <div id="map" class="bg-white"></div> -->
          </div>
        </div>
      </div>
    </section>
<?php include 'footer.php';?>
<script type="text/javascript">
      $(document).ready(function(){
        $("#login").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        if(username==''||password=='')
        {
         $("#msg").addClass('alert-danger').html("<ul>All Fields are mendatory</ul>");
                $("#msg").css("display","block");
        }
        else
        {
          var data = $('form').serializeArray();
        $.ajax({
        type: "POST",
        url: "controller/login.php",
        data: data,
        dataType: "json",
        success: function(result)
        {
        if (result.code == "200"){
            $('#msg').addClass('alert alert-success offset4 span4').html(result.msg).fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 2000);
            if (result.role=='1') {
              setTimeout(function(){
                window.location='shop.php';
              }, 2000);
            }
          else{
            setTimeout(function(){
                window.location='restaurant_view.php';
              }, 2000);
          }
        } else {
                 $('#msg').addClass('alert alert-danger offset4 span4').html(result.msg).fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
            }
        }
        });
        }
        return false;
       });
      });
    </script>