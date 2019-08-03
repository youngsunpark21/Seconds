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

<h4 id="recommendationHeader">Wish List</h4>

<div class="card-columns" id="recommendationCardDeck">

<?php
  //reconnect to the database
  $this->load->database();

  //list of all items in the user's wish list
  $wishlist_items = array();

  //retrieve all the saved items from database
  $load_items_sql = "SELECT item_id FROM wishlist WHERE username = ?";
  $load_items_query = $this->db->query($load_items_sql,array($_SESSION['username']));
  
  foreach($load_items_query->result_array() as $wish_row) {
    $wishlist_items[] = $wish_row['item_id'];
  }

  //retrieve only the wishlist items information from the database
  for($x = 0; $x < count($wishlist_items); $x++) {
    $sql = "SELECT * FROM items WHERE item_id = ?";
    $query = $this->db->query($sql,array($wishlist_items[$x]));

    foreach($query->result_array() as $row) {
        echo "<div class='card'>";
        echo "<a id='cardLinks' href='";
        echo site_url('item/index');
        echo "/";
        echo $row['item_id'];
        echo "'>";
    
        echo "<img src='";
        echo base_url();
        echo "image/sampleItem.jpg' class='card-img-top' alt='sampleItem'>";
    
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

        //already save to wishlist, show 'remove' footer
        if(in_array($row['item_id'], $wishlist_items)) {
            echo "<div class='card-footer'>";
            echo "<img src='";
            echo base_url();
            echo "image/heart_fill.png' width='20' height='20' id='heart_fill' class='align-top' alt='fill_heart'>";
            echo "<small class='text-muted'> Remove from wishlist</small> </div>";
        }else{
            //not saved to wishlist, show 'add' footer
            echo "<div class='card-footer'>";
            echo "<img src='";
            echo base_url();
            echo "image/heart_empty.png' width='20' height='20' id='heart_empty' class='align-top' alt='empty_heart'>";
            echo "<small class='text-muted'> Save to wishlist</small> </div>";
        }

        echo "</div>";
      }
  }
  
?>

</div>
</div>
</div>