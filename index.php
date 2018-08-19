<!--Header-->
<?php include "partials/header.php"; ?>
<?php require_once './vendor/autoload.php'; ?>
<?php $loader = new Twig_Loader_Filesystem('./templates/'); ?>

<?php $twig = new Twig_Environment($loader); ?>
<!---------->

<!---Sidebar--->
<?php
    echo $twig->render('sidebar.html', array('text' => 'Hello world!'));
?>

    <?php include "controllers/mainsection_controller.php"?>
    <?php include "controllers/player_controller.php";?>


<!--Footer-->
<?php  include "partials/footer.php"?>
<!----------->


