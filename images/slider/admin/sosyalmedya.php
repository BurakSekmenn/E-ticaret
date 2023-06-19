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
              <form action="islem/islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook :</label>
                    <input type="text" value="<?php echo $ayarcek['facebook']; ?>" class="form-control" name="facebook" placeholder="Sitenizin Başlığını Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">İnstagram :</label>
                    <input type="text" value="<?php echo $ayarcek['instagram']; ?>" class="form-control" name="instagram" placeholder="Sitenizin Açıklmasını Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Twitter :</label>
                    <input type="text" value="<?php echo $ayarcek['twitter']; ?>" class="form-control" name="twitter" placeholder="Sitenizin Anahtar Kelimesini Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Youtube :</label>
                    <input type="text" value="<?php echo $ayarcek['youtube']; ?>" class="form-control" name="youtube" placeholder="Sitenizin Anahtar Kelimesini Giriniz.">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="sosyalkaydet" type="submit" class="btn btn-primary">Göner</button>
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