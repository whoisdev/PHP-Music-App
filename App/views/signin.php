<?php  include APPROOT . '/views/inc/header.php' ?>
<?php 

require('../App/views/inc/sidebar.php');
require_once APPROOT.'/../vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('../App/templates');
$twig = new Twig_Environment($loader, array(
    'debug' => true
));
$twig->addExtension(new Twig_Extension_Debug());

?>
<div class="col-sm-8 col-md-8 main-section" id="main"><?php 
    echo $twig->render('signin.html',array(
        'error'=>$data,
        'root'=>URLROOT
    ));
?></div>
<?php
?>
</div>
<?php  include APPROOT . '/views/inc/footer.php' ?>
