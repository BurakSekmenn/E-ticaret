<?php

require_once 'header.php';

require_once 'sidebar.php';


$ayar=$baglanti->prepare("SELECT * FROM urunler WHERE urun_id={$_GET['urunid']}");
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
                    <label for="exampleInputPassword1">Ürün Kategori :</label>
                     <select name="kategori_id" class="form-control" disabled>
                        <?php 
                            $katid=$_GET['katid'];
                            $kategori=$baglanti->prepare("SELECT * FROM kategori order by kategori_id ASC");
                            $kategori->execute();
                            while($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)){ 

                                $kategoriid=$kategoricek['kategori_id'];
                        ?>
                                <option <?php if($katid==$kategoriid){
                                    echo "selected";
                                } ?> value="<?php echo $kategoriid ?>" ><?php echo $kategoricek['kategori_adi'];?></option>
                        <?php }?>
                     </select>
                  </div> 

                <input type="text" name ="kategori_id" value="<?php echo $_GET['katid'] ?>">
                <input type="text" name ="urun_id" value="<?php echo $_GET['urunid']  ?>">
                <input type="text" name ="eskiresim" value="<?php echo $ayarcek['urun_resim']  ?>">

                <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Mevcut Resim :</label>
                     <img src="resimler/urunler/<?php echo $ayarcek['urun_resim']; ?>" style="height: 250px;width: 300px;">
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Resim :</label>
                    <input type="file" class="form-control" name="logo">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Başlık :</label>
                    <input type="text"  class="form-control" name="urun_baslik" value=<?php echo $ayarcek['urun_baslik']; ?>>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün anahtar kelime :</label>
                    <input type="text" class="form-control" name="urun_anahtar" value=<?php echo $ayarcek['urun_anahtar']; ?>>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Aciklama:</label>
                    <textarea class="ckeditor"  name="urun_aciklama" id="editor1"></textarea>
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün sıra:</label>
                    <input type="text" class="form-control" name="urun_sira" value=<?php echo $ayarcek['urun_sira']; ?>>
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Model :</label>
                    <input type="text" class="form-control" name="urun_model" value=<?php echo $ayarcek['urun_model']; ?>>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Renk :</label>
                    <input type="text" class="form-control" name="urun_renk" value=<?php echo $ayarcek['urun_model']; ?>>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün adet :</label>
                    <input type="text" class="form-control" name="urun_adet" value=<?php echo $ayarcek['urun_adet']; ?>>
                  </div>             
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Fiyat :</label>
                    <input type="text"  class="form-control" name="urun_fiyat" value=<?php echo $ayarcek['urun_fiyat']; ?>>
                  </div> 
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Öne Çıkar :</label>
                    <select class="form-control select2bs4" name="urun_onecikar" style="width: 100%;">
                    <option value="1" <?php 
                        if($ayarcek['urun_onecikar']=="1"){
                            echo "selected";
                        }
                    ?> >Öne Çıkar</option>
                    <option value="0" <?php 
                          if($ayarcek['urun_onecikar']=="0"){
                            echo "selected";
                        }
                    ?>>Çıkarma</option>
                  </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Urun durum :</label>
                    <select class="form-control select2bs4" name="urun_durum" style="width: 100%;">
                    <option value="1" <?php
                     if($ayarcek['urun_durum']=="1"){
                        echo "selected";
                    }
                    
                    ?>>Aktif</option>
                    <option value="0"
                    <?php
                     if($ayarcek['urun_durum']=="0"){
                        echo "selected";
                    }
                    
                    ?>>Pasif</option>
                  </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="urunduzenle" type="submit" class="btn btn-primary">Düzenle</button>
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