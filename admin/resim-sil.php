<?php

require_once 'header.php';

require_once 'sidebar.php';


$ayar=$baglanti->prepare("SELECT * FROM coklu_resim WHERE urun_id={$_GET['urunid']}");
$ayar->execute();




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
                <h3 class="card-title">Mevcut Resimler </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="resimyukle.php" method="post"  enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                <?php $say=1; while($ayarcek=$ayar->fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="col-md-4">
                       <img src="resimler/cokluresim/<?php echo $ayarcek['urun_resim']; ?>" style="height: 250px;width: 300px;">
                        
                        <label> <?php echo $say++.".resim) "; ?><?php echo $ayarcek['urun_resim']; ?></label>
                    </div>
                <?php } ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Silinecek Resimi Seçiniz:</label>
                    <select name="urun_resim">
                        <?php
                        
                        $denemecek=$baglanti->prepare("SELECT * FROM coklu_resim WHERE urun_id={$_GET['urunid']}");
                        $denemecek->execute();
                        
                        ?>
                        <?php $say=1;while($getirbakem=$denemecek->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $getirbakem['urun_resim']; ?>"><?php echo $say++.".resim)" ?> <?php echo $getirbakem['urun_resim']; ?></option>
                    
                        <?php } ?>
                    </select>
                  </div> 
                  <div class="form-group">
                    <input name="yönlendirme" type="hidden" value="<?php echo $_GET['urunid']; ?>">
                    
                    
                  </div> 
                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="resimsil" type="submit" class="btn btn-primary">Sil</button>
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