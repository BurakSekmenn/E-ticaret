<?php

require_once 'header.php';

require_once 'sidebar.php';


$ayar=$baglanti->prepare("SELECT * FROM urunler WHERE urun_id={$_GET['urunid']}");
$ayar->execute();
$ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);

$resime=$baglanti->prepare("SELECT * FROM coklu_resim WHERE urun_id={$_GET['urunid']}");
$resime->execute();



?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12 mt-3 ">
                <?php 
                 if(@$_GET['durum']=='okey') { ?>
                 <div class="bg-success text-white" style="height: 30px;">
                    <p class="pl-3 pt-1">İşlem Başarili</p>
                 </div>
                <?php }elseif(@$_GET['durum']=='hata'){?>
                <div class="bg-danger text-white" style="height: 30px;">
                <p class="pl-3 pt-1">İşlem Başarisiz</p>
                 </div>
                <?php }?>
            </div>
        </div>
        <div class="row">
        
        <div class="card card-primary col-md-12 mt-3">
              <div class="card-header">
                <h3 class="card-title">Genel Ayarlar </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                      <div class="form-group">
                        <label class="rounded mx-auto d-block" for="exampleInputPassword1">Ürün Banner Resim :</label>
                        <img class ="rounded mx-auto d-block" src="resimler/urunler/<?php echo $ayarcek['urun_resim']; ?>" style="height: 250px;width: 300px;">
                      </div>
                </div>
              
            </div>
            <div class="card card-primary col-md-12 mt-1">
              <div class="card-header">
                <h3 class="card-title">Resim Yükle </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="dropzone mt-1" method="post" action="resimyukle.php" enctype="multipart/form-data" id="my-awesome-dropzone">
                  <input type="hidden" name="urun_id" value="<?php echo $ayarcek['urun_id']; ?>">
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