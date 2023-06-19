<?php

require_once 'header.php';

require_once 'sidebar.php';


$kullanicisor=$baglanti->prepare("SELECT * FROM kategori where kategori_id=:kategori_id");
$kullanicisor->execute(array(
  'kategori_id' => $_GET['kategori_id']
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
                    <label for="exampleInputEmail1">Kategori Adi :</label>
                    <input type="text" value="<?php echo $kullanicicek['kategori_adi']; ?>" class="form-control" name="kategori_adi" placeholder="Sitenizin Başlığını Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Sira :</label>
                    <input type="text" value="<?php echo $kullanicicek['kategori_sira']; ?>" class="form-control" name="kategori_sira" placeholder="Sitenizin Başlığını Giriniz.">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Kategori Durum :</label>
                  <select class="form-control select2bs4" name="kategori_durum" style="width: 100%;">
                    <option value="1" <?php 
                        if($kullanicicek['kategori_durum']=="1"){
                            echo "selected";
                        }
                    ?>>Aktif</option>
                    <option value="0" <?php 
                            if($kullanicicek['kategori_durum']=="0"){
                                echo "selected";
                            }
                    ?> >Pasif</option>
                  </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" value="<?php echo $_GET['kategori_id']?>" name="kategori_id">
                <div class="card-footer">
                  <button name="kategoriduzenle" type="submit" class="btn btn-primary">Düzenle</button>
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