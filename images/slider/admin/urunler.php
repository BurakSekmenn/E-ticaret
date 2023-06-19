<?php

require_once 'header.php';

require_once 'sidebar.php';
$gelenkatid=$_GET['katid'];
$slider=$baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id ORDER BY urun_id ASC ");
$slider->execute(array(
  'kategori_id'=>$gelenkatid
));
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
            <a href="urun-ekle?katid=<?php echo $_GET['katid'] ?>"><button class="btn btn-primary ">Ürün Ekle</button></a>
          </div>
        <div class="card col-md-12 mt-3">
              <div class="card-header">
               <h2 class="card-title">Ürünler Tablosu , </h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ürün Resim</th>
                    <th>Ürün Başlık </th>
                    <th>Ürün Model</th>
                    <th>Ürün Renk </th>
                    <th>Ürün Durum</th>
                    <th>Ürün Sıra </th>
                    <th>Ürün Stok Sayısı </th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                    <th>Resim İşlemleri</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sayi=0;
                    while($slidercek=$slider->fetch(PDO::FETCH_ASSOC)) {  ?> 
                  <tr>
                    <td><img src="resimler/urunler/<?php echo $slidercek['urun_resim'] ?>" style="width:250px; height: 150px;"></td>
                    <td><?php echo $slidercek['urun_baslik'] ?></td>
                    <td><?php echo $slidercek['urun_model'] ?></td>
                    <td><?php echo $slidercek['urun_renk'] ?></td>
                    <td><?php $bak=$slidercek['urun_durum'];
                                if($bak == "1"){
                                    echo "Aktif";
                                }else{
                                    echo "Pasif";
                                }
                    ?></td>
                    <td><?php echo $slidercek['urun_sira'] ?></td>
                    <td><?php echo $slidercek['urun_adet'] ?></td>
                    <td><a href="urun-duzenle?katid=<?php echo $_GET['katid']?>&urunid=<?php echo $slidercek['urun_id'] ?>"><button class="btn btn-primary">Düzenle</button></a></td>
                    <td><a href="islem/islem.php?urun_id=<?php echo $slidercek['urun_id'];?>&urun_resim=<?php echo $slidercek['urun_resim'] ?>&kategori_id=<?php echo $slidercek['kategori_id']; ?>&urunsil=ok"><button class="btn btn-danger">Sil</button></a></td>
                    <td><a href="coklu-resim?urunid=<?php echo $slidercek['urun_id'] ?>"><button class="btn btn-success">Resim Ekle</button></a></td>
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