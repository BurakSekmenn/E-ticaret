<?php

require_once 'header.php';

require_once 'sidebar.php';


$kullanicisor=$baglanti->prepare("SELECT * FROM slider where slider_id=:slider_id");
$kullanicisor->execute(array(
  'slider_id' => $_GET['slider_id']
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
                    <label for="exampleInputPassword1">Uye Mevcut Resim :</label>
                    <img style="width: 200px; height:200px;" src="resimler/slider/<?php echo $kullanicicek['slider_resim']; ?>">
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Slider Resim :</label>
                    <input type="file" class="form-control" name="logo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Başlık :</label>
                    <input type="text"  class="form-control" name="slider_baslik"  value="<?php echo $kullanicicek['slider_aciklama']; ?>" placeholder="Kullanici Adinizi Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider açıklama :</label>
                    <input type="text"  class="form-control" name="slider_aciklama" value="<?php  echo $kullanicicek['slider_aciklama']; ?>" placeholder="Adınız ve Soyadınızı  Giriniz.">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider sıra :</label>
                    <input type="text" class="form-control" name="slider_sira"  value="<?php  echo $kullanicicek['slider_sira']; ?>" placeholder="Adresinizi Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider link :</label>
                    <input type="text"  class="form-control" name="slider_link"  value="<?php echo  $kullanicicek['slider_link']; ?>"  placeholder="Adınız ve Soyadınızı  Giriniz.">
                  </div>               
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Button İsmi :</label>
                    <input type="text"  class="form-control" name="slider_button_yazi"  value="<?php echo  $kullanicicek['slider_button_yazi']; ?>"  placeholder="Adınız ve Soyadınızı  Giriniz.">
                  </div> 
                  <input type="hidden" value="<?php echo $kullanicicek['slider_resim'] ?>" name="eskilogo">
                  <input type="hidden" value="<?php echo $kullanicicek['slider_id'] ?>" name="slider_id">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Durum :</label>
                    <select class="form-control select2bs4" name="slider_durum" style="width: 100%;">
                    <option value="1" <?php if($kullanicicek["slider_durum"]=="1"){
                            echo "selected";
                             }?>>Aktif</option>
                    <option value="0" <?php if($kullanicicek["slider_durum"]=="0"){
                            echo "selected";
                    }
                    ?>>Pasif</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Banner :</label>
                    <select class="form-control select2bs4" name="slider_banner" style="width: 100%;">
                    <option value="1" <?php if($kullanicicek["slider_banner"]=="1"){
                            echo "selected";
                             }?>>Slider</option>
                    <option value="0" <?php if($kullanicicek["slider_banner"]=="0"){
                            echo "selected";
                    }
                    ?>>Banner</option>
                  </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" value="<?php echo $_GET['kategori_id']?>" name="kategori_id">
                <div class="card-footer">
                  <button name="sliderduzenle" type="submit" class="btn btn-primary">Düzenle</button>
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