<?php

require_once 'header.php';

require_once 'sidebar.php';

$slider=$baglanti->prepare("SELECT * FROM slider ORDER BY slider_id ASC ");
$slider->execute();
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
            <a href="slider-ekle"><button class="btn btn-primary ">Slider Ekle</button></a>
          </div>
        <div class="card col-md-12 mt-3">
              <div class="card-header">
               <h2 class="card-title">Slider Tablosu </h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slider Resim</th>
                    <th>Slider Başlık</th>
                    <th>Slider Açıklama</th>
                    <th>Slider button ismi </th>
                    <th>Slider Durum</th>
                    <th>Slider Sıra </th>
                    <th>Slider Banner </th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sayi=0;
                    while($slidercek=$slider->fetch(PDO::FETCH_ASSOC)) {  ?> 
                  <tr>
                    <td><img src="resimler/slider/<?php echo $slidercek['slider_resim'] ?>" style="width:250px; height: 150px;"></td>
                    <td><?php echo $slidercek['slider_baslik'] ?></td>
                    <td><?php echo $slidercek['slider_aciklama'] ?></td>
                    <td><?php echo $slidercek['slider_button_yazi'] ?></td>
                    <td><?php $bak=$slidercek['slider_durum'];
                                if($bak == "1"){
                                    echo "Aktif";
                                }else{
                                    echo "Pasif";
                                }
                    ?></td>
                    <td><?php echo $slidercek['slider_sira'] ?></td>
                    <td><?php $bak=$slidercek['slider_banner'];
                            if($bak == "1"){
                                echo "Slider";
                            }elseif($bak =="0"){
                                echo "Banner";
                            }
                    ?></td>
                    <td><a href="slider-duzenle?slider_id=<?php echo $slidercek['slider_id'] ?>"><button class="btn btn-primary">Düzenle</button></a></td>
                    <td><a href="islem/islem.php?slider_id=<?php echo $slidercek['slider_id'] ?>&kategorisil=ok"><button class="btn btn-danger">Sil</button></a></td>
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