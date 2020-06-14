
<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_id'] != NULL) {
        header('Location:dashbord.php');
    }
}
if (isset($_POST['btn'])) {
    require_once '../class/login.php';
    $login = new Login;
    $message = $login->admin_login_check($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title> Blog Admin Panel</title>
        <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-7">
                    <div class="well" style="margin-top:90px; padding:60px; margin-left:5%;">
                        <h4 class="text-center text-success">Please enter valid email address & password</h4>
                        <h3 class="text-danger text-center">
                            <?php
                            if (isset($message)) {
                                echo $message;
                            }
                            ?>
                        </h3>
                        <hr/>
                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <label class="control-label col-md-3">Email-Address</label>
                                <div class="col-md-9">
                                    <input type="email" name="email_address" required class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" required class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">  
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" name="btn" class="btn btn-primary btn-block btn-lg" value="Login"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="../asset/js/bootstrap.min.js"></script>
    </body>
</html>
