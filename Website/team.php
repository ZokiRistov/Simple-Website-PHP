<?php

    define ("Title", "Restaurant's Staff");
    include 'includes/header.php';

?>


    <div id="team-members" class="cf">
        <h1>Our Team</h1>
		<p>We're small, but mighty. Franklin's Fine Dining has been a family-owned and run business since the dirty thirties, and we're proud of it! When you get these three together, you never know what can happen. But you can count on one thing: <strong>The best food you've ever had. Ever.</strong></p>
		
		<hr>
    

    <?php
        foreach ($team_members as $member) {

    ?>

        <div class="team-members" style="text-align: center;">

            <img src="img/<?php echo $member[image]; ?>.png" alt="<?php echo $member[name]; ?>" >
            <h3><?php echo $member[name];?> </h3>
            <p><?php echo $member[short-bio];?> </p>
        </div>
        
    <?php
        }
    ?>
    </div><!-- team-members -->
<?php
    include 'includes/footer.php';
?>