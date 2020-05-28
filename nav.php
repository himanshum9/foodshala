 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark  ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.php" style="color: #18a2b8;">FOODSHALA</a>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <!-- <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li> -->
              <?php
              if(!isset($_SESSION['user']))
                {
              ?>
              <li class="nav-item"><a href="login.php" class="nav-link" style="color: #18a2b8;">Login</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: #18a2b8;" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="register_user.php" style="color: #18a2b8;">Customer Register</a>
                <a class="dropdown-item" href="register_restaurant.php" style="color: #18a2b8;">Restaurant Register</a>
              </div>
            </li>
            <?php
                }
            ?>
            <?php
             if(isset($_SESSION['restaurant']))
                {
            ?>
              <li class="nav-item"><a href="restaurant_view.php" class="nav-link" style="color: #18a2b8;">My Restaurant</a></li>
            <?php
                }
            ?> 
              <li class="nav-item"><a href="shop.php" class="nav-link" style="color: #18a2b8;">Food Zone</a></li>
              <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
              <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
              <?php
              if(isset($_SESSION['user']))
                {
                  ?>
                <li class="nav-item dropdown">
                  <!-- <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a> -->
                  <!-- <div class="dropdown-menu" aria-labelledby="dropdown04"> -->
                    <!-- <a class="dropdown-item" href="register_user.php">Customer Register</a> -->
                    <!-- <a class="dropdown-item" href="register_restaurant.php">Restaurant Register</a> -->
                  <!-- </div> -->
                
                <a href="logout.php" style="color: #18a2b8;" class="nav-link <?php echo ((!isset($_SESSION['restaurant'])) ? 'dropdown-toggle': ''); ?>" ><?php echo $_SESSION['user']['username']; ?> (Logout)</a>
                <?php
                  if(!isset($_SESSION['restaurant']))
                  {
                ?>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" style="color: #18a2b8;" href="myOrders.php">My Orders</a>
              </div>
              <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><i class="material-icons" >shopping_cart</i><span id="aaa" class="w3-badge"><?php echo isset($_SESSION['cart'])?count($_SESSION['cart']):''; ?></span></a></li>
                <?php
                }
              }
                ?>
                


            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->