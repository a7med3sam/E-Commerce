<?php 
session_start();
include 'init.php'; ?>

    <div class='container'>
        <h1 class='text-center'>Show Categories Items</h1>
        <div class='row'>
            <?php
            
                if(isset($_GET['pageid']) && is_numeric($_GET['pageid'])){
                    $category = intval($_GET['pageid']);
                    $allItems = getAllFrom("*", "items", "WHERE Cat_ID = {$category}", "AND Approve = 1", "Item_ID");
                    foreach($allItems as $item){
                        echo "<div class='col-sm-6 col-md-3'>";
                            echo "<div class='card item-box'>";
                                echo "<span class='price-tag'>$". $item['Price'] ."</span>";
                                echo "<img src = 'index.jpg' alt='none'>";
                                echo "<div class='card-body'>";
                                    echo "<h3 class='card-title'><a href='items.php?itemid=". $item['Item_ID'] ."'>" . $item['Name'] ."</a></h3>";
                                    echo "<p class='card-text'>". $item['Description'] ."</p>";
                                    echo "<div class='date'>". $item['Add_Date'] ."</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                }else{
                    echo "set the ID";
                }

            ?>
        </div>
    </div>

<?php include $tpl. 'footer.php'; ?>