<div>
    <p>You searched for: <?php echo $keyword; ?> </p>
</div>
<div class="card-columns" id="recommendationCardDeck">

<?php
   $this->load->library('session');
    
    //list of all items in the user's wish list
    $wishlist_items = array();

    //retrieve all the saved items from database
    $load_items_sql = "SELECT item_id FROM wishlist WHERE username = ?";
    $load_items_query = $this->db->query($load_items_sql,array($_SESSION['username']));

    foreach($load_items_query->result_array() as $wish_row) {
    $wishlist_items[] = $wish_row['item_id'];
    }

    if($search_result != null){
        foreach($search_result as $row) {
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
    } else {
        echo "<div><h1>There is no matching items</h1></div>";
    }
        ?>
</div>
