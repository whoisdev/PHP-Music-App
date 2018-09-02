<?php  include_once APPROOT . '/views/inc/header.php' ?>
<?php 
require_once('../App/views/inc/sidebar.php');
require_once '../../vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('../App/templates');
$twig = new Twig_Environment($loader, array(
    'debug' => true
));
$twig->addExtension(new Twig_Extension_Debug());
?>

<div class="col-sm-8 col-md-8 main-section" id="main"><?php 
    $songTitle=$data['songs'];
    echo $twig->render('songs.html',array(
        'data' => $songTitle,
        'title' => 'ALL SONGS',
        'root'=>URLROOT
    ));
?></div>
<?php
?>
</div>
<?php  include_once APPROOT . '/views/inc/footer.php' ?>
