<!--Header-->
<?php include "partials/header.php"; ?>

<!---Sidebar--->
<?php
    echo $twig->render('sidebar.html', array('text' => 'Hello world!'));
?>
<!---->

<?php include "controllers/mainsection_controller.php"?>
<?php include "controllers/player_controller.php";?>

<!--Footer-->
<?php  include "partials/footer.php"?>
<!----------->


