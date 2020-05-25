 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.php">FOODSHALA</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <!-- <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li> -->
              <?php
              if(!isset($_SESSION['user']))
                {
              ?>
              <li class="nav-item active"><a href="login.php" class="nav-link">Login</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="register_user.php">Customer Register</a>
                <a class="dropdown-item" href="register_restaurant.php">Restaurant Register</a>
              </div>
            </li>
            <?php
                }
            ?>
            <?php
             if(isset($_SESSION['restaurant']))
                {
            ?>
              <li class="nav-item"><a href="restaurant_view.php" class="nav-link">My Restaurant</a></li>
            <?php
                }
            ?> 
              <li class="nav-item"><a href="shop.php" class="nav-link">Food Zone</a></li>
              <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
              <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
              <?php
              if(isset($_SESSION['user']))
                {
                  ?>
                <li class="nav-item"><a href="logout.php" class="nav-link"><?php echo $_SESSION['user']['username']; ?> (Logout)</a></li>
                <?php
                }
                ?>
                <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><i class="material-icons">shopping_cart</i></a></li>


            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->