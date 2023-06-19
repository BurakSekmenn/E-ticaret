<?php

require_once 'header.php';

require_once 'sidebar.php';
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
                    <label for="exampleInputEmail1">Kategori Adi :</label>
                    <input type="text"  class="form-control" name="kategori_adi" placeholder="Kategori Adinizi Giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori sıra :</label>
                    <input type="text"  class="form-control" name="kategori_sira" placeholder="Kategori sira Giriniz.">
                  </div>
                  <div class="form-group">
                  <label>Kategor Durum</label>
                  <select class="form-control select2bs4" name="kategori_durum" style="width: 100%;">
                    <option value="1">Aktif</option>
                    <option value="2">Pasif</option>
                  </select>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="ktgekle" type="submit" class="btn btn-primary">Ekle</button>
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