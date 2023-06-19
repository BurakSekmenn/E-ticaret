<?php

require_once 'header.php';

require_once 'sidebar.php';


$ayar=$baglanti->prepare("SELECT * FROM ayarlar WHERE id=1");
$ayar->execute();
$ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);

$kullanici=$baglanti->prepare("SELECT * FROM kullanici ");
$kullanici->execute();
?>
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
          <div class="col-md-12 mt-3 d-flex justify-content-end">
            <a href="uye-ekle"><button class="btn btn-primary ">Üye Ekle</button></a>
          </div>
        <div class="card col-md-12 mt-3">
              <div class="card-header">
               <h2 class="card-title">Üyeler </h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sıra</th>
                    <th>Kullanici Adi</th>
                    <th>Adı Soyadi </th>
                    <th>Yetki Türü</th>
                    <th>Adres</th>
                    <th>İl</th>
                    <th>İlce</th>
                    <th>Telefon</th>
                    <th>Resim</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sayi=0;
                    while($kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC)) {  ?> 
                  <tr>
                    <td><?php echo $sayi=$sayi+1; ?></td>
                    <td><?php echo $kullanicicek['kullanici_adi'] ?></td>
                    <td><?php echo $kullanicicek['kullanici_adsoyad'] ?></td>
                    <td><?php  $bak =$kullanicicek['kullanici_yetki'];
                                if($bak == 2){
                                    echo "Yetkili Kişi";
                                }else{
                                    echo "Normal Üye";
                                }
                    ?></td>
                    <td><?php echo $kullanicicek['kullanici_adres'] ?></td>
                    <td><?php echo $kullanicicek['kullanici_il'] ?></td>
                    <td><?php echo $kullanicicek['kullanici_ilce'] ?></td>
                    <td><?php echo $kullanicicek['kullanici_tel'] ?></td>
                    <td><?php echo $kullanicicek['kullanici_resim'] ?></td> 
                    <!-- <?php echo $kullanicicek['kullanici_id'] ?> -->
                    <td><a href="uye-duzenle?kullanici_id=<?php echo $kullanicicek['kullanici_id'] ?>"><button class="btn btn-primary">Düzenle</button></a></td>
                    <td><a href="islem/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id'] ?>&kullanicisil=ok"><button class="btn btn-danger">Sil</button></a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  
 <?php 
 require_once 'footer.php';
 ?>