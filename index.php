<!--Header-->
<?php include "partials/header.php"; ?>

<!---Sidebar--->
<?php
    if(isset($_SESSION['user'])){
        echo $twig->render('sidebar.html', array('name' => $_SESSION['user']));
    }
    else{
        echo $_SESSION['user'];
        echo $twig->render('sidebar.html',array('name' => "login"));
    }
    if(isset($_GET['src'])){
        include "controllers/singup.php";
    }
    else{
        include "controllers/mainsection_controller.php";
    }
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
<!---->
<?php echo $twig-> render('player.html'); ?>
<!--Footer-->
<?php  include "partials/footer.php"?>
<!----------->


