
            <!--start: Container -->
            <div class="container">

                <!--start: Row -->
                <div class="row">

                    <!--start: Logo -->
                    <div class="logo span3">

                        <a class="brand" href="#"><img src="assets/images/brand/merche-logo.png" alt="Logo"></a>

                    </div>
                    <!--end: Logo -->

                    <!--start: Navigation -->
                    <div class="span9">

                        <div class="navbar navbar-inverse">
                            <div class="navbar-inner">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li><a href="index.php?link=produk">Produk Kami</a></li>
                                        <li><a href="index.php?link=komentar">Komentar Anda</a></li>
                                        <li><a href="index.php?link=keranjang">Keranjang</a></li>
                                        <?php
                                            if (empty($_SESSION['username'])){
                                            echo '<li><a href="index.php?link=login">Login</a></li>';
                                            }else {
                                            echo '<li><a href="logout.php">Logout</a></li>';
                                            echo '<li><a>'.$_SESSION['nama_usr'].'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>	
                    <!--end: Navigation -->

                </div>
                <!--end: Row -->

            </div>
            <!--end: Container-->			
