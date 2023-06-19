<?php
require_once 'header.php';
?>


      
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Li's Banner Area -->
                            <div class="single-banner shop-page-banner">
                                <a href="#">
                                    <img src="images/bg-banner/2.jpg" alt="Li's Static Banner">
                                </a>
                            </div>
                            <!-- Li's Banner Area End Here -->
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                   
                                    <div class="toolbar-amount">
                                        <span>Showing 1 to 9 of 15</span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->
                                <div class="product-select-box">
                                    <div class="product-short">
                                        <p>Sırala:</p>
                                        <select class="nice-select">
                                            
                                            <option value="sales">İsimine Göre (A - Z)</option>
                                            <option value="sales">İsimine Göre (Z - A)</option>
                                            <option value="rating">Fiyata Göre (Az &gt; Çok)</option>
                                            <option value="date">Fiyata Göre (Çok &gt; az)</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <?php
                            $gelenkatid=$_GET['kategori_id'];
                            $slider=$baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id and urun_durum='1' ORDER BY urun_sira ASC ");
                            $slider->execute(array(
                              'kategori_id'=>$gelenkatid
                            ));
                            
                            
                            ?>
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                           
                                            <div class="row">
                                                <?php  while($slidercek=$slider->fetch(PDO::FETCH_ASSOC)) {  ?>
                                                <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="urun-detay-<?=seolink($slidercek['urun_baslik']). '-' .$slidercek['urun_id'] ?>">
                                                                <img src="admin/resimler/urunler/<?php echo $slidercek['urun_resim'];?> ?>" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                
                                                                <h4><a class="product_name" href="urun-detay-<?=seolink($slidercek['urun_baslik']). '-' .$slidercek['urun_id'] ?>"><?php echo $slidercek['urun_baslik'] ?></a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">₺<?php echo $slidercek['urun_fiyat'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a href="urun-detay-<?=seolink($slidercek['urun_baslik']). '-' .$slidercek['urun_id'] ?>">Detay</a></li>                                                                  
                                                                    <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div> 
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    



                       






                                    


                               
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p>Showing 1-12 of 13 item(s)</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box">
                                                    <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                                    </li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li>
                                                      <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
           <?php
            require_once 'footer.php';
           ?>