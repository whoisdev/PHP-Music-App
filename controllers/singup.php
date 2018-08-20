<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $username = mysqli_real_escape_string($connection,$username);
        $password = $_POST['password'];
        $password = mysqli_real_escape_string($connection, $password);
        $password = md5($password);
        $add_user = "INSERT INTO users ";
        $add_user .="(username, password) VALUES ('{$username}','{$password}')";
        $result = mysqli_query($connection, $add_user);
        header('location:index');
    }

?>
<div class="col-sm-9 col-md-9 main-section">
    <form class="login_form" method="post" action="">
        <h3>SIGN UP</h3>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter UserName">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button name="submit" type="submit" class="btn btn-primary log_in_button">Sing up</button>
    </form>
</div>
