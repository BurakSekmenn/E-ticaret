<?php

require_once 'header.php';

require_once 'sidebar.php';


$ayar=$baglanti->prepare("SELECT * FROM ayarlar WHERE id=1");
$ayar->execute();
$ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);



?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
       
        <div class="row">
        <div class="card card-primary col-md-12 mt-3">
              <div class="card-header">
                <h3 class="card-title">Genel Ayarlar </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kullanici Adi :</label>
                    <input type="text"  class="form-control" name="kullanici_adi" placeholder="Kullanici Adinizi Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Adı Soyadı :</label>
                    <input type="text"  class="form-control" name="kullanici_adsoyad" placeholder="Adınız ve Soyadınızı  Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Adress :</label>
                    <input type="text" class="form-control" name="kullanici_adres" placeholder="Adresinizi Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">İl :</label>
                    <input type="text" class="form-control" name="kullanici_il" placeholder="İl Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">İlce :</label>
                    <input type="text"  class="form-control" name="kullanici_ilce" placeholder="İlce  Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telefon :</label>
                    <input type="text"  class="form-control" name="kullanici_tel" placeholder="Telefon Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Uye Mevcut Resim :</label>
                    <img style="width: 200px; height:200px;" src="resimler/uyeresim/<?php echo $kullanicicek['kullanici_resim']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Resim :</label>
                    <input type="file" class="form-control" name="logo">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="uyeekle" type="submit" class="btn btn-primary">Göner</button>
                </div>
              </form>
            </div>
        
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php 
 require_once 'footer.php';
 ?>