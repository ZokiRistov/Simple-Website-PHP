<?php

    define ('Title', "Menu Page");

    include ('includes/header.php');


?>

    <div id="menu-items">
    
        <h1> The Menu of the Restaurant </h1>

        <p>We do not offer many dishes, but everything we offer is very delicious and top notch quality.</p>
    
        <p><em>Click on any of the proposed dishes to learn more about them.</em></p>
        <hr/>

        <ul>
            <?php foreach($menuItems as $dish => $item) {?>
            
            <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item[title]; ?> </a> <?php echo $item[price]; ?> <sup>$</sup></li>
            
        <?php } ?>
        </ul>
    </div>


<?php

    include ('includes/footer.php');


?>