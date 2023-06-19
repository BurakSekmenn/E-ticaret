<?php

require_once 'header.php';

require_once 'sidebar.php';


$ayar=$baglanti->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=1");
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
              <form action="islem/islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <input type="hidden" name="eskilogo" value="<?php echo $ayarcek['hakkimizda_resim'] ?>">
                <div class="form-group">
                    <label for="exampleInputPassword1">Resim :</label>
                    <img style="width: 200px; height:200px;" src="resimler/hakkimizda/<?php echo $ayarcek['hakkimizda_resim']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Resim :</label>
                    <input type="file" class="form-control" name="logo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hakkımızda Başlık :</label>
                    <input type="text" value="<?php echo $ayarcek['hakkimizda_baslik']; ?>" class="form-control" name="baslik" placeholder="Lütfen Başlığını Giriniz.">
                  </div>
                  <div class="form-group">
                    
                    <label for="exampleInputPassword1">Hakkımızda Detay :</label>
                    <textarea class="ckeditor"  name="detay" id="editor1"> <?php echo $ayarcek['hakkimizda_detay']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Misyon:</label>
                    <textarea class="ckeditor"  name="misyon" id="editor1"> <?php echo $ayarcek['hakkimizda_misyon']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Vizyon:</label>
                    <textarea class="ckeditor"  name="vizyon" id="editor1"> <?php echo $ayarcek['hakkimizda_vizyon']; ?></textarea>
                  </div>
                  
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="hakkaydet" type="submit" class="btn btn-primary">Göner</button>
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