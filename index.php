<?php
require_once("koneksi.php");
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- start: Meta Data -->
        <meta charset="utf-8">
        <title>E-Commerce</title> 
        <meta name="description" content="Sistem, information, informasi, web"/>
        <meta name="keywords" content="Distro, Murah, Baju, lengkap" />
        <meta name="author" content="Merche"/>
        <!-- end: Meta Data -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS --> 
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- end: CSS -->
        
        <link rel="icon" href="assets/images/logo.jpg">
        
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

        <!--start: Header -->
        <header>
            <?php include_once './content/header.php';?>
        </header>
        <!--end: Header -->
        
        <!--start: Content -->
        <?php
        $lnk = filter_input(INPUT_GET, 'link', FILTER_SANITIZE_URL);
        if (empty($lnk)) {
            include_once './content/home.php';
        }elseif ($lnk=='produk') {
            include_once './content/produk.php';
        }elseif ($lnk=='detailbarang') {
            $kd = filter_input(INPUT_GET, 'kd', FILTER_SANITIZE_URL);
            if(!empty($kd)){
                $_SESSION['kd']    = $kd;
            }
            include_once './content/produk_detail.php';
        }elseif ($lnk=='keranjang') {
            include_once './content/keranjang.php';
        }elseif ($lnk=='checkout') {
            include_once './content/checkout.php';
        }elseif ($lnk=='komentar') {
            include_once './content/komentar.php';
        }elseif ($lnk=='selesai') {
            include_once './content/selesai.php';
        }elseif ($lnk=='login') {
            include_once './content/login.php';
        }elseif ($lnk=='memberform') {
            include_once './content/member.php';
        } 
        ?>
        <!--end: Content -->

        <!-- start: Footer -->
        <div id="footer">
            <?php include_once './content/footer.php';?>
        </div>
        <!-- end: Footer -->
        
        <!-- start: Copyright -->
        <div id="copyright">
            <div class="container">
                <p>
                    Copyright &copy; <a href="#">Merche 2020</a> Supported by <a href="https://github.com/coreui/coreui-free-bootstrap-admin-template" alt="Bootstrap Themes">Bootstrap Themes</a>
                </p>
            </div>
        </div>	
        <!-- end: Copyright -->
        
        <!-- start: Java Script -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-1.8.2.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/flexslider.js"></script>
        <script src="assets/js/carousel.js"></script>
        <script src="assets/js/jquery.cslider.js"></script>
        <script src="assets/js/slider.js"></script>
        <script defer="defer" src="assets/js/custom.js"></script>
        <!-- end: Java Script -->

    </body>
</html>