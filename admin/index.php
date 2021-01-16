<?php
session_start();
if (isset($_SESSION["gagal"])) {
    if ($_SESSION["gagal"] >= 3) {
        echo '<h1>ANDA SEDANG DIBLOKIR</h1>';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="assets/images/logo.jpg">
        <title>Login | Merche</title>
        <link href="assets/bootstrap41/css/bootstrap.min.css" rel="stylesheet">
        <script>
            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 2000);
        </script>        
    </head>
    <body class="text-center">
        <div class="container">
            <div class="border rounded col-lg-3 col-md-5 col-sm-4 col-xl-3" style="margin: 0 auto; margin-top: 100px;">
                <form id="frm01" name="frm01" method="POST" action="login_cek.php" class="form-signin">
                    <img class="mb-4" src="assets/images/user.jpg" alt="" width="100" height="100" style="margin-top: 10px">
                    <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
                    <?php
                    if(isset($_SESSION["gagal"])){
                        if($_SESSION["gagal"] < 3){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    GAGAL Login ke-'.$_SESSION["gagal"].'..!!!!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                        }
                    }
                    ?>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="inEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <br>
                    <input type="password" id="inputPassword" name="inPass" class="form-control" placeholder="Password" required>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    <p class="mt-5 mb-3 text-muted">&copy; Merche 2020</p>
                </form>
            </div>
        </div>
        <script src="assets/js/jquery-3.3.1.min.js"></script>      
        <script src="assets/bootstrap41/js/bootstrap.min.js"></script>
    </body>
</html>