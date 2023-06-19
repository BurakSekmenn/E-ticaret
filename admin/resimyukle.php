<?php
require_once 'islem/baglanti.php';
if(!empty($_FILES)){
        $yonledirme=$_POST['urun_id'];
        $uploads_dir="resimler/cokluresim";
        @$tmp_name=$_FILES['file']["tmp_name"];
        @$name = $_FILES['file']["name"];

        $sayi = rand(1,100000);
        $sayi2 = rand(1,100000);
        $sayi3 = rand(10000,2000000);

        $sayilar =$sayi.$sayi2.$sayi3;
        $resimyol = $sayilar.$name;
        @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");

        $kaydet=$baglanti->prepare("INSERT INTO coklu_resim SET
        urun_id=:urun_id,
        urun_resim=:urun_resim");
        $update=$kaydet->execute(array(
            'urun_id' => $_POST['urun_id'],
            'urun_resim' => $resimyol
        ));
        
}

if(isset($_POST['resimsil'])){

    print_r($_POST);
    $yonlendir = $_POST['yönlendirme'];
    $urunresim=$_POST['urun_resim'];
    $kaydet=$baglanti->prepare("DELETE FROM coklu_resim where urun_resim=:urun_resim");
    $update=$kaydet->execute(array(
        'urun_resim' =>$urunresim
    ));
    if($update){
        unlink("../resimler/cokluresim/$urunresim");
        header("Location:resim-sil?urunid=$yonlendir&durum=okey");
    }else{
        header("Location:resim-sil?urunid=$yonlendir&durum=hata");
    }
    
    
    
}



?>