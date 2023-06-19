<?php
$slider=$baglanti->prepare("SELECT * FROM slider where slider_banner=:slider_banner and slider_durum=:slider_durum ORDER BY slider_sira ASC ");
$slider->execute(array(
    'slider_banner'=>1,
    'slider_durum'=>1
));

?>

<div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Slider Area -->
                        <div class="col-lg-8 col-md-8">
                            <div class="slider-area">
                                <div class="slider-active owl-carousel">
                                   <?php while($slidercek=$slider->fetch(PDO::FETCH_ASSOC)){ ?> 
                                    <!-- Begin Single Slide Area -->
                                    <div style="background-image: url(admin/resimler/slider/<?php echo $slidercek['slider_resim']; ?>);" class="single-slide align-center-left  animation-style-01 bg-1">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Bu Haftaya Özel <span>-20% </span> İndirim</h5>
                                            <h2><?php echo $slidercek['slider_baslik'] ?></h2>
                                            <h3><?php echo $slidercek['slider_aciklama'] ?></h3>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="#"><?php echo $slidercek['slider_button_yazi'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>


                                    <!-- Single Slide Area End Here -->
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                        <!-- Begin Li Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                            <?php
                            $slider=$baglanti->prepare("SELECT * FROM slider where slider_banner=:slider_banner and slider_durum=:slider_durum ORDER BY slider_sira ASC LIMIT 2 ");
                            $slider->execute(array(
                                'slider_banner'=>0,
                                'slider_durum'=>1
                            ));
                            
                            ?>
                            <?php $say=0; while($slidercek=$slider->fetch(PDO::FETCH_ASSOC)){ ?>
                            <div class="li-banner">
                                <!-- <a href="<?php echo $slidercek['slider_link'] ?>">
                                    <img src="admin/resimler/slider/<?php echo $slidercek['slider_resim']; ?>" alt="">
                                </a> -->
                                <?php 
                                    if($say==0){?>
                                          <a href="<?php echo $slidercek['slider_link'] ?>">
                                          <img src="admin/resimler/slider/<?php echo $slidercek['slider_resim']; ?>" alt="">
                                          </a> <br>
                                 <?php }else{?>
                                          <a href="<?php echo $slidercek['slider_link'] ?>">
                                          <img src="admin/resimler/slider/<?php echo $slidercek['slider_resim']; ?>" alt="">
                                          </a>
                                 <?php
                                 } ?>
                               
                            </div>
                           <?php } ?>
                        </div>
                        <!-- Li Banner Area End Here -->
                    </div>
                </div>
            </div>