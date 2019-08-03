      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clothing
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Outers</a>
                    <a class="dropdown-item" href="#">Tops</a>
                    <a class="dropdown-item" href="#">Bottoms</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Electronics
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Computers</a>
                    <a class="dropdown-item" href="#">Mobile Phones</a>
                    <a class="dropdown-item" href="#">Other Gadgets</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Stationery
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Files/Binders</a>
                    <a class="dropdown-item" href="#">Pen/Penciles</a>
                    <a class="dropdown-item" href="#">Others</a>
                  </div>
              </li>
            </ul>

          </div>
      </nav>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo base_url();?>image/sample1.jpg" class="d-block w-100" alt="sample1" style="width:100%; height: 400px;">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url();?>image/sample2.jpg" class="d-block w-100" alt="sample2" style="width:100%; height: 400px;">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url();?>image/sample3.jpg" class="d-block w-100" alt="sample3" style="width:100%; height: 400px;">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>

      <h4 id="recommendationHeader">Recommended for you</h4>

      <div class="card-columns" id="recommendationCardDeck">

        <?php
          //reconnect to the database
          $this->load->database();

          //list of all items in the user's wish list
          $wishlist_items = array();

          //retrieve all the saved items from database
          if (isset($_SESSION['username'])) {
            $load_items_sql = "SELECT item_id FROM wishlist WHERE username = ?";
            $load_items_query = $this->db->query($load_items_sql,array($_SESSION['username']));

            foreach($load_items_query->result_array() as $wish_row) {
              $wishlist_items[] = $wish_row['item_id'];
            }
          }
          //retrieve all the item information here
          $sql = "SELECT * FROM items";
          $query = $this->db->query($sql);

          foreach($query->result_array() as $row) {
            echo "<div class='card'>";
            echo "<a id='cardLinks' href='";
            echo site_url('item/index');
            echo "/";
            echo $row['item_id'];
            echo "'>";

            //retrieve item picture
            $pic_sql = "SELECT picture FROM pictures WHERE item_id = ?";
            $pic_query = $this->db->query($pic_sql, array($row['item_id']));
            $picture = $pic_query->row_array();

            if($picture['picture'] != null){
              echo "<img src='";
              echo $picture['picture'];
              echo "' class='card-img-top' alt='sampleItem'>";
            } else {
              echo "<img src='";
              echo base_url();
              echo "image/sampleItem.jpg' class='card-img-top' alt='sampleItem'>";
            }

            echo "<div class='card-body'> <div class='d-flex d-flex justify-content-between'>";
            echo "<h5 class='card-title'>";
            echo $row['item_title'];
            echo "</h5>";

            echo "<p class=''><b>";
            echo $row['cost'];
            echo "</b></p>";
            echo "</div>";

            echo "<p class='card-text'>";
            echo $row['time'];
            echo "</p>";
            echo "</div> </a>";

            
            if (isset($_SESSION['username'])){
              //already save to wishlist, show 'remove' footer
              if(in_array($row['item_id'], $wishlist_items)) {
                echo "<div class='card-footer' id='removeWishlist' data-itemid='";
                echo $row['item_id'];
                echo "' data-username='";
                echo $_SESSION['username'];
                echo "'>";
                echo "<img src='";
                echo base_url();
                echo "image/heart_fill.png' width='20' height='20' id='heart_fill' class='align-top' alt='fill_heart'>";
                echo "<small class='text-muted'> Remove from wishlist</small> </div>";
              }else{
                //not saved to wishlist, show 'add' footer
                echo "<div class='card-footer' id='addWishlist' data-itemid='";
                echo $row['item_id'];
                echo "' data-username='";
                echo $_SESSION['username'];
                echo "'>";
                echo "<img src='";
                echo base_url();
                echo "image/heart_empty.png' width='20' height='20' id='heart_empty' class='align-top' alt='empty_heart'>";
                echo "<small class='text-muted'> Save to wishlist</small> </div>";
              }
            }
            
            echo "</div>";
          }
        ?>

        <script>
          $(document).ready(function() {

            $('#addWishlist').click(function() {
              console.log("added");
              var item_id = $(this).data("itemid");
              var username = $(this).data("username");
              console.log(item_id);
              console.log(username);

              $.ajax({
                url:"<?php echo site_url('wishlist/add'); ?>",
                method: "POST",
                data: {username: username, item_id: item_id},
                success: function(data) {
                  alert('Product added into wishlist');
                }
              });
            });

            $('#removeWishlist').click(function() {
              console.log("removed");
              var item_id = $(this).data("itemid");
              var username = $(this).data("username");
              console.log(item_id);
              console.log(username);

              $.ajax({
                url:"<?php echo site_url('wishlist/remove'); ?>",
                method: "POST",
                data: {username: username, item_id: item_id},
                success: function(data) {
                  alert('Product removed from wishlist');
                }
              });
            });
          });
        </script>
        
      </div>