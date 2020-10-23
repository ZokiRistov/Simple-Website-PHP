<?php

    define ("Title", "Restaurant's Menu Items");

    include 'includes/header.php';


    //Prevent outside influence on $GET

    function strip_bad_chars ($input) {

        $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }


    if (isset($_GET['item'])) {

        $menuItem = strip_bad_chars ($_GET['item']);
        $dish = $menuItems[$menuItem];
    }
    

    //Suggested tip based on the price of the dish, using built-in number_format function

    function suggestedTip($price, $tip) {

        $totalTip = $price * $tip;
        echo number_format($totalTip, 2, '.', '' );
    }

?>

    <hr>

    <div id="dish">
	
    <h1><?php echo $dish["title"]; ?> <span class="price"><sup>$</sup><?php echo $dish["price"]; ?></span></h1>
    <p><?php echo $dish["description"]; ?></p>
    <br>

    <p><strong>Suggested beverage: <?php echo $dish["drink"]; ?></strong></p>
    
    <p><em>Suggested tip: <sup>$</sup>
    
    <?php suggestedTip($dish["price"], 0.20); ?>
    </em></p>
    

    </div>

    <hr>

    <a href="menu.php" class="button previous"> &laquo; Back to Menu</a>

<?php include 'includes/footer.php'; ?>