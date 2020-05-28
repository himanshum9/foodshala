  <?php include 'header.php';
 if (isset($_SESSION['user'])) {
  header('location:page_403.php');
  }
  ?>
		<div class="hero-wrap hero-bread" style="background-image: url('images/lauren-mancke-sil2Hx4iupI-unsplash.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 text-center">
            <h1 class="mb-0 bread">Register As Restaurants</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form id="form-register" name="form-register" method="POST" class="bg-white p-5 contact-form">
              <div class="form-group">
                <label class="col-form-label"  for="name">UserName</label><span class="required">*</span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label class="col-form-label"  for="name">Email</label><span class="required">*</span>
                <input type="email" class="form-control" id="email" name="email"placeholder="Your Email">
              </div>
              <div class="form-group">
                <label class="col-form-label"  for="name">Phone No.</label><span class="required">*</span>
                <input type="number" class="form-control" id="phone" name="contact" placeholder="Phone No.">
              </div>
              <div class="form-group">
                <label class="col-form-label"  for="name">Password</label><span class="required">*</span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
              </div>
              <div class="form-group">
                <label class="col-form-label"  for="name">Confirm Password</label><span class="required">*</span>
                <input type="password" class="form-control" id="confirmpassword" name="confirm_password" placeholder="Confirm password">
              </div>
              <div class="form-group">
                <label class="col-form-label"  for="name">Your Address</label><span class="required">*</span>
                <input type="textarea" class="form-control" id="address" name="address" placeholder="Enter Address">
              </div>
              <div class="form-group">
                <label class="col-form-label"  for="name">Restaurant Name</label><span class="required">*</span>
                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="Enter Restaurant Name">
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" id="user_role" name="user_role" value="2">
              </div>
               <div class="alert alert-danger display-error" style="display: none;">
              </div>
              <div class="alert alert-success display-success" style="display: none;">
              </div>
              <div class="form-group">
                <input type="button" value="Submit" id="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>

          <div class="col-md-6 d-flex">
          	<img id="map" class="bg-white" src="images/heather-barnes-gP1YecpRyD8-unsplash.jpg" ></div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php';?>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#submit").click(function(){
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmpassword = $("#confirmpassword").val();
        var number = $("#phone").val();

        if (password!=confirmpassword) {
          $('#msg').addClass('alert alert-danger offset4 span4').html("Passwords did'nt match!!").fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
            return false;
          }
        if(name==''||email==''||password==''||number=='')
        {
           $('#msg').addClass('alert alert-danger offset4 span4').html("Please Fill the required fields").fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 4000);
            return false;
        }
        else
        {
          var data = $('form').serializeArray();
          $.ajax({
          type: "POST",
          url: "controller/register.php",
          dataType: "json",
          data: data,
          success: function(result){
             if (result.code == "200"){
               $('#msg').addClass('alert alert-success offset4 span4').html(result.msg).fadeIn('slow');
            setTimeout(function() { $("#msg").fadeOut('slow'); }, 2000);
                setTimeout(function(){
                  window.location='login.php';
                }, 2000);
            } else 
            {
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
