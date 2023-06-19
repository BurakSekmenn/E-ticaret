<?php 
    require_once 'header.php';
?>
           
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container ">
                    <div class="row">
                         <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
                         <?php 
                              if(@$_GET['durum']=='okey') { ?>
                            <div class="bg-success text-white" style="height: 30px;">
                                <p class="pl-3 pt-1">İşlem Başarili</p>
                             </div>
                            <?php }elseif(@$_GET['durum']=='hata'){?>
                             <div class="bg-warning  text-dark" style="height: 50px;">
                             <p class="pl-3 pt-1"><h6>Kullanici Adi Veya Paroyı Hatalı Girdiniz.</h6></p>
                             </div>
                         <?php }elseif(@$_GET['durum']=='farkli'){?>
                            <div class="bg-warning  text-dark" style="height: 50px;">
                             <p class="pl-3 pt-1"><h6>Şifreleri Farklı Giridiniz kontrol ediniz.</h6></p>
                            </div>
                         <?php }elseif(@$_GET['durum']=='uzunaz'){?>
                            <div class="bg-warning  text-dark" style="height: 50px;">
                             <p class="pl-3 pt-1"><h6>Şifreniz 8 Haneli değildir.</h6></p>
                            </div>
                         <?php }elseif(@$_GET['durum']=='var'){?>
                            <div class="bg-warning  text-dark" style="height: 50px;">
                             <p class="pl-3 pt-1"><h6>Böyle Bir kullanici var lütfen başka bir kullanici adi giriniz.</h6></p>
                            </div>
                         <?php } ?>

                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="admin/islem/islem.php" method="post" >
                                <div class="login-form">
                                    <h4 class="login-title">Giriş Yap</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Kullanıcı Adı:</label>
                                            <input required="" class="mb-0" type="type" name="kulladi" placeholder="Kullanıcı Adınızı Giriniz">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Şifrenizi Giriniz :</label>
                                            <input required="" class="mb-0" type="password" name="kullsifre" placeholder="Şifrenizi Giriniz">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Beni Hatırla</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="#"> Şifreni mi Unuttun ?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button name="login" class="register-button mt-0">GİRİŞ YAP</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="admin/islem/islem.php" method="post">
                                <div class="login-form">
                                    <h4 class="login-title">Kayıt Ol</h4>
                                    <div class="row">
                                        <div class="col-md-12 mb-20">
                                            <label>Adınız ve Soyadınız :</label>
                                            <input required="" name="kadi" class="mb-0" type="text" placeholder="Adınızı Giriniz">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Kullanici Adiniz :</label>
                                            <input  required="" name="kuadi" class="mb-0" type="text" placeholder="Kullanici Adınızı Giriniz">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>E-Mail Adresiniz :</label>
                                            <input  required="" name="kmail" class="mb-0" type="email" placeholder="Email Addresini Giriniz">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Şifrenizi Giriniz :</label>
                                            <input  required="" name="ksifre" class="mb-0" type="password" placeholder="Şifrenizi Giriniz">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Şifrenizi Giriniz :</label>
                                            <input required=""  name="ksifre2" class="mb-0" type="password" placeholder="Şifrenizi tekrar giriniz.">
                                        </div>
                                        <div class="col-12">
                                            <button name="register" class="register-button mt-0">Kayıt Ol</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
<?php 
 require_once 'footer.php';

?>
           