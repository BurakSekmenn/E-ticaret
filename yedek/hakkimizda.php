
<?php
    require_once 'header.php';
    require_once 'admin/islem/baglanti.php';
?>
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- about wrapper start -->
            <div class="about-us-wrapper pt-60 pb-40">
                <div class="container">
                    <div class="row">
                        <!-- About Text Start -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="about-text-wrap">
                                <h2><?php echo $hakkimizdacek['hakkimizda_baslik'] ?></h2>

                                <p><?php echo $hakkimizdacek['hakkimizda_detay'] ?></p>
                                <h4>Misyonumuz</h4>
                                <p><?php echo $hakkimizdacek['hakkimizda_misyon'] ?></p>
                                <h4>Visyonumuz</h4>
                                <p><?php echo $hakkimizdacek['hakkimizda_vizyon'] ?></p>
                                
                            </div>
                        </div>
                        <!-- About Text End -->
                        <!-- About Image Start -->
                        <div class="col-lg-5 col-md-10">
                            <div class="about-image-wrap">
                                <img class="img-full" src="admin/resimler/hakkimizda/<?php echo $hakkimizdacek['hakkimizda_resim']?>" alt="About Us" />
                            </div>
                        </div>
                        <!-- About Image End -->
                    </div>
                </div>
            </div>
            <!-- about wrapper end -->
           
           
        <?php
            require_once 'footer.php';
        ?>
