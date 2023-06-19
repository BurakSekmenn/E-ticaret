<?php

require_once 'header.php';

require_once 'sidebar.php';


$ayar=$baglanti->prepare("SELECT * FROM ayarlar WHERE id=1");
$ayar->execute();
$ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$baglanti->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
$kullanicisor->execute(array(
  'kullanici_id' => $_GET['kullanici_id']
  ));

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
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
                    <input type="text" value="<?php echo $kullanicicek['kullanici_adi']; ?>" class="form-control" name="kullanici_adi" placeholder="Sitenizin Başlığını Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Adı Soyadı :</label>
                    <input type="text" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" class="form-control" name="kullanici_adsoyad" placeholder="Sitenizin Açıklmasını Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Adress :</label>
                    <input type="text" value="<?php echo $kullanicicek['kullanici_adres']; ?>" class="form-control" name="kullanici_adres" placeholder="Sitenizin Anahtar Kelimesini Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">İl :</label>
                    <input type="text" value="<?php echo $kullanicicek['kullanici_il']; ?>" class="form-control" name="kullanici_il" placeholder="Sitenizin Anahtar Kelimesini Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">İlce :</label>
                    <input type="text" value="<?php echo $kullanicicek['kullanici_ilce']; ?>" class="form-control" name="kullanici_ilce" placeholder="Sitenizin Anahtar Kelimesini Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telefon :</label>
                    <input type="text" value="<?php echo $kullanicicek['kullanici_tel']; ?>" class="form-control" name="kullanici_tel" placeholder="Sitenizin Anahtar Kelimesini Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Uye Mevcut Resim :</label>
                    <img style="width: 200px; height:200px;" src="resimler/uyeresim/<?php echo $kullanicicek['kullanici_resim']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Resim :</label>
                    <input type="file" class="form-control" name="logo">
                  </div>
                  <input type="hidden" name="eskilogo" value="<?php echo $kullanicicek['kullanici_resim']; ?>">


                  <input type="hidden" value="<?php echo $kullanicicek['kullanici_id']; ?>" name="kullanici_id">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="uyeguncelle" type="submit" class="btn btn-primary">Göner</button>
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