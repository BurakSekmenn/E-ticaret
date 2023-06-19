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
                <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Resim :</label>
                    <input type="file" class="form-control" name="logo">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Başlık :</label>
                    <input type="text"  class="form-control" name="urun_baslik" placeholder="Slider Başlığını Giriniz.">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün anahtar kelime :</label>
                    <input type="text" class="form-control" name="urun_anahtar" placeholder="Slider sıra giriniz Giriniz.">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Aciklama:</label>
                    <textarea class="ckeditor"  name="urun_aciklama" id="editor1"></textarea>
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün sıra:</label>
                    <input type="text" class="form-control" name="urun_sira" placeholder="Slider sıra giriniz Giriniz.">
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Model :</label>
                    <input type="text" class="form-control" name="urun_model" placeholder="Slider sıra giriniz Giriniz.">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Renk :</label>
                    <input type="text" class="form-control" name="urun_renk" placeholder="Slider sıra giriniz Giriniz.">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün adet :</label>
                    <input type="text" class="form-control" name="urun_adet" placeholder="Slider sıra giriniz Giriniz.">
                  </div>             
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Fiyat :</label>
                    <input type="text"  class="form-control" name="urun_fiyat" placeholder="Slider link  Giriniz.">
                  </div> 
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Öne Çıkar :</label>
                    <select class="form-control select2bs4" name="urun_onecikar" style="width: 100%;">
                    <option value="1">Öne Çıkar</option>
                    <option value="0">Çıkarma</option>
                  </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Urun durum :</label>
                    <select class="form-control select2bs4" name="urun_durum" style="width: 100%;">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="urunekle" type="submit" class="btn btn-primary">ekle</button>
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