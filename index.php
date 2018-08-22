<!--Header-->
<?php include "partials/header.php"; ?>
<!--<div id="main">-->
<!---Sidebar--->
<?php
     $router = new router();

    if(isset($_POST['singout'])){
        $_SESSION['user'] = null;
    }
    if(isset($_SESSION['user']))    {
        echo $twig->render('sidebar.html', array('name' => $_SESSION['user']));
    }
    else{
//        echo $_SESSION['user'];
        echo $twig->render('sidebar.html',array('name' => "login"));
    }
    ?>
<div class="col-sm-9 col-md-9 main-section" id="main">
<?php
    if(isset($_GET['src'])){
        $router->get($_GET['src']);
    }

    else if(isset($_GET['request'])){
        $router->get($_GET['request']);
    }
    else if(isset($_GET['playlist'])){
        $router->get($_GET['playlist']);
    }
    else if(isset($_GET['profile'])){
        $router->get($_GET['profile']);
    }
//    include "controllers/mainsection_controller.php";
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $query_get_user = "SELECT password from users ";
        $query_get_user .= "WHERE username = '{$username}' ";
        $result = mysqli_query($connection, $query_get_user);
        $data = mysqli_fetch_assoc($result);
        if(md5($password) === ($data['password'])){
            $_SESSION['user'] = $username;
            header('location:index');
        }
    }
?>
</div>
<!---->
<?php echo $twig-> render('player.html'); ?>
<!--Footer-->
<?php  include "partials/footer.php"?>
<!----------->
<!--</div>-->

