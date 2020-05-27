  <?php include 'header.php';?>
		<div class="hero-wrap hero-bread" style="background-image: url('images/lauren-mancke-sil2Hx4iupI-unsplash.jpg');">
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
              <h3>Welcome Back ! <br>
                                Please <b>Sign in</b> now</h3>
            </div>
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
               <div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;coord=29.5407388,75.04590259999999&amp;q=Sirsa+(FoodShala)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/draw-radius-circle-map/">Create radius map</a></iframe></div><br />
            </form>

          
          </div>

          <div class="col-md-6 d-flex">
            <img class="img-fluid" src="images/eiliv-sonas-aceron-ZuIDLSz3XLg-unsplash.jpg" alt="Colorlib Template">
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