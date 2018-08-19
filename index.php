<!--Header-->
<?php include "partials/header.php"; ?>

<!---Sidebar--->
<?php
    echo $twig->render('sidebar.html', array('text' => 'Hello world!'));
?>
<!---->
<?php include "controllers/mainsection_controller.php"?>
<?php echo $twig-> render('player.html'); ?>
<!--Footer-->
<?php  include "partials/footer.php"?>
<!----------->


