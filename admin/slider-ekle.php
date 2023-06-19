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
                    <label for="exampleInputPassword1">Slider Resim :</label>
                    <input type="file" class="form-control" name="logo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Başlık :</label>
                    <input type="text"  class="form-control" name="slider_baslik" placeholder="Slider Başlığını Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider açıklama :</label>
                    <input type="text"  class="form-control" name="slider_aciklama" placeholder="Slider açılmasını  Giriniz.">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider sıra :</label>
                    <input type="text" class="form-control" name="slider_sira" placeholder="Slider sıra giriniz Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider link :</label>
                    <input type="text"  class="form-control" name="slider_link" placeholder="Slider link  Giriniz.">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Button Yazi :</label>
                    <input type="text"  class="form-control" name="slider_button_yazi" placeholder="Slider button yazi  Giriniz.">
                  </div>                  
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Durum :</label>
                    <select class="form-control select2bs4" name="slider_durum" style="width: 100%;">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Banner :</label>
                    <select class="form-control select2bs4" name="slider_banner" style="width: 100%;">
                    <option value="1">Slider Yap</option>
                    <option value="0">Banner Yap</option>
                  </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="sliderekle" type="submit" class="btn btn-primary">ekle</button>
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