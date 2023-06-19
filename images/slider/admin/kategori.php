<?php

require_once 'header.php';

require_once 'sidebar.php';


$ayar=$baglanti->prepare("SELECT * FROM ayarlar WHERE id=1");
$ayar->execute();
$ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);

$kullanici=$baglanti->prepare("SELECT * FROM kategori ORDER BY kategori_sira ASC ");
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
            <a href="kategori-ekle"><button class="btn btn-primary ">Kategori Ekle</button></a>
          </div>
        <div class="card col-md-12 mt-3">
              <div class="card-header">
               <h2 class="card-title">Kategori Tablosu </h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kategori Numara</th>
                    <th>Kategori id</th>
                    <th>Kategori Adi</th>
                    <th>Kategori Sıra </th>
                    <th>Kategori Durum</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                    <th>Ürünlere git</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sayi=0;
                    while($kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC)) {  ?> 
                  <tr>
                    <td><?php echo $sayi=$sayi+1; ?></td>
                    <td><?php echo $kullanicicek['kategori_id'] ?></td>
                    <td><?php echo $kullanicicek['kategori_adi'] ?></td>
                    <td><?php echo $kullanicicek['kategori_sira'] ?></td>
                    <td><?php  $bak=$kullanicicek['kategori_durum'];
                                if($bak == "1"){
                                    echo "Aktif";
                                }else{
                                    echo "Pasif";
                                }
                    ?></td>
                    
                    <td><a href="kategori-duzenle?kategori_id=<?php echo $kullanicicek['kategori_id'] ?>"><button class="btn btn-primary">Düzenle</button></a></td>
                    <td><a href="islem/islem.php?kategori_id=<?php echo $kullanicicek['kategori_id'] ?>&kategorisil=ok"><button class="btn btn-danger">Sil</button></a></td>
                    <td><a href="urunler?katid=<?php echo $kullanicicek['kategori_id']?>"><button class="btn btn-primary">Git</button></a></td>
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