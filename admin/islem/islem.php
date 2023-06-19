<?php
session_start();
ob_start();
require_once 'baglanti.php';
// ---------------------
// menü ayarlar başlangıç
// ---------------------

if(isset($_POST['ayarkaydet'])){

    $kaydet=$baglanti->prepare("UPDATE ayarlar SET
    baslik=:baslik,
    aciklama=:aciklama,
    anahtarkelime=:anahtarkelime where id=1");
    $update =$kaydet->execute(array(
        'baslik' => $_POST['baslik'],
        'aciklama' => $_POST['aciklama'],
        'anahtarkelime' =>$_POST['anahtarkelime']
    ));
    if($update){
        header("Location:../ayarlar.php?durum=okey")  ;
    }else{
        header("Location:../ayarlar.php?durum=hata")  ;  
    }
}

if(isset($_POST['iletisimkaydet'])){

    $kaydet=$baglanti->prepare("UPDATE ayarlar SET
    telefon=:telefon,
    adres=:adres,
    email=:email,
    mesai=:mesai where id=1");
    $update =$kaydet->execute(array(
        'telefon' => $_POST['telefon'],
        'adres' => $_POST['adres'],
        'email' =>$_POST['email'],
        'mesai' =>$_POST['mesai']
    ));
    if($update){
        header("Location:../iletisim.php?durum=okey")  ;
    }else{
        header("Location:../iletisim.php?durum=hata")  ;  
    }
}

if(isset($_POST['sosyalkaydet'])){

    $kaydet=$baglanti->prepare("UPDATE ayarlar SET
    facebook=:facebook,
    instagram=:instagram,
    twitter=:twitter,
    youtube=:youtube where id=1");
    $update =$kaydet->execute(array(
        'facebook' => $_POST['facebook'],
        'instagram' => $_POST['instagram'],
        'twitter' =>$_POST['twitter'],
        'youtube' =>$_POST['youtube']
    ));
    if($update){
        header("Location:../sosyalmedya.php?durum=okey")  ;
    }else{
        header("Location:../sosyalmedya.php?durum=hata")  ;  
    }
}
if(isset($_POST['logokaydet'])){
    $uploads_dir="../resimler/logo";
    @$tmp_name=$_FILES['logo']["tmp_name"];
    @$name = $_FILES['logo']["name"];

    $sayi = rand(1,100000);
    $sayi2 = rand(1,100000);
    $sayi3 = rand(10000,2000000);

    $sayilar =$sayi.$sayi2.$sayi3;
    $resimyol = $sayilar.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");
    
    $kaydet=$baglanti->prepare("UPDATE ayarlar SET
    logo=:logo
    where id=1");
    $update =$kaydet->execute(array(
        'logo' => $resimyol
    ));
    if($update){
        $resimsil = $_POST['eskilogo'];
        unlink("../resimler/logo/$resimsil");
        header("Location:../ayarlar.php?durum=succ")  ;
    }else{
        header("Location:../ayarlar.php?durum=war")  ;  
    }

}
// ---------------------
// menü ayarlar Bitiş
// ---------------------

// ---------------------
// Hakkimizda Sayfa Başlangıç
// ---------------------

if(isset($_POST['hakkaydet'])){
    $uploads_dir="../resimler/hakkimizda";
    @$tmp_name=$_FILES['logo']["tmp_name"];
    @$name = $_FILES['logo']["name"];

    $sayi = rand(1,100000);
    $sayi2 = rand(1,100000);
    $sayi3 = rand(10000,2000000);

    $sayilar =$sayi.$sayi2.$sayi3;
    $resimyol = $sayilar.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");

    $kaydet=$baglanti->prepare("UPDATE hakkimizda SET
    hakkimizda_baslik=:hakkimizda_baslik,
    hakkimizda_detay=:hakkimizda_detay,
    hakkimizda_misyon=:hakkimizda_misyon,
    hakkimizda_vizyon=:hakkimizda_vizyon,
    hakkimizda_resim=:hakkimizda_resim
    where hakkimizda_id=1");
    $update =$kaydet->execute(array(
        'hakkimizda_baslik' => $_POST['baslik'],
        'hakkimizda_detay' => $_POST['detay'],
        'hakkimizda_misyon' =>$_POST['misyon'],
        'hakkimizda_vizyon' =>$_POST['vizyon'],
        'hakkimizda_resim' =>$resimyol
    ));
    if($update){
        $resimsil = $_POST['eskilogo'];
        unlink("../resimler/hakkimizda/$resimsil");
        header("Location:../hakkimizda.php?durum=okey")  ;
    }else{
        header("Location:../hakkimizda.php?durum=hata")  ;  
    }
}

// ---------------------
// Hakkimizda Sayfa Bitiş
// ---------------------

// ---------------------
// Admin Login başlangıç
// ---------------------
if(isset($_POST['girisyap'])){
    
    $kadi=htmlspecialchars($_POST['kadi']);
    $sifre = htmlspecialchars($_POST['sifre']);
    $md5hali = md5($sifre);
     $kullanicisor = $baglanti->prepare("SELECT * FROM kullanici where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre  and kullanici_yetki=:kullanici_yetki");
     $kullanicisor->execute(array(
         'kullanici_adi'=>$kadi,
         'kullanici_sifre'=>$md5hali,
         'kullanici_yetki' =>1
     ));
     $var = $kullanicisor->rowCount();
     if ($var>0) {
         $_SESSION['name']=$kadi;
         header("Location:../index?durum=hosgeldin");
     }else{
          header("Location:../login?durum=hata");
     }
}

// ---------------------
// Admin Login bitiş
// ---------------------

// ---------------------
// Uye Kısmı Başlangıç
// ---------------------
if(isset($_POST['uyeguncelle'])){
    
      print_r($_POST);
      $uploads_dir="../resimler/uyeresim";
      @$tmp_name=$_FILES['logo']["tmp_name"];
      @$name = $_FILES['logo']["name"];

      $sayi = rand(1,100000);
      $sayi2 = rand(1,100000);
      $sayi3 = rand(10000,2000000);

      $sayilar =$sayi.$sayi2.$sayi3;
      $resimyol = $sayilar.$name;
      @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");
     
      print_r($resimyol);

      $kaydet=$baglanti->prepare("UPDATE kullanici SET
      kullanici_adi=:kullanici_adi,
      kullanici_adsoyad=:kullanici_adsoyad,
      kullanici_adres=:kullanici_adres,
      kullanici_il=:kullanici_il,
      kullanici_ilce=:kullanici_ilce,
      kullanici_tel=:kullanici_tel,
      kullanici_resim=:kullanici_resim
      where kullanici_id={$_POST['kullanici_id']}");
      $update =$kaydet->execute(array(
          'kullanici_adi' => $_POST['kullanici_adi'],
          'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
          'kullanici_adres' =>$_POST['kullanici_adres'],
          'kullanici_il' =>$_POST['kullanici_il'],
          'kullanici_ilce' =>$_POST['kullanici_ilce'],
          'kullanici_tel' =>$_POST['kullanici_tel'],
          'kullanici_resim' =>$resimyol
      ));
      if($update){
        $resimsil = $_POST['eskilogo'];
        unlink("../resimler/uyeresim/$resimsil");
        header("Location:../uyeler.php?durum=okey");
    }else{
        header("Location:../uyeler.php?durum=hata");  
    }
}
if(isset($_POST['uyeekle'])){
    
    print_r($_POST);
    $uploads_dir="../resimler/uyeresim";
    @$tmp_name=$_FILES['logo']["tmp_name"];
    @$name = $_FILES['logo']["name"];

    $sayi = rand(1,100000);
    $sayi2 = rand(1,100000);
    $sayi3 = rand(10000,2000000);

    $sayilar =$sayi.$sayi2.$sayi3;
    $resimyol = $sayilar.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");
   

    $kaydet=$baglanti->prepare("INSERT INTO kullanici SET
    kullanici_adi=:kullanici_adi,
    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_adres=:kullanici_adres,
    kullanici_il=:kullanici_il,
    kullanici_ilce=:kullanici_ilce,
    kullanici_tel=:kullanici_tel,
    kullanici_resim=:kullanici_resim");
    $update =$kaydet->execute(array(
        'kullanici_adi' => $_POST['kullanici_adi'],
        'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_adres' =>$_POST['kullanici_adres'],
        'kullanici_il' =>$_POST['kullanici_il'],
        'kullanici_ilce' =>$_POST['kullanici_ilce'],
        'kullanici_tel' =>$_POST['kullanici_tel'],
        'kullanici_resim' =>$resimyol
    ));
    if($update){
      header("Location:../uyeler.php?durum=okey");
     }else{
      header("Location:../uyeler.php?durum=hata");  
    }
}

if(@$_GET["kullanicisil"]=="ok"){
    $sil=$baglanti->prepare("DELETE from kullanici where kullanici_id=:kullanici_id");
	$kontrol=$sil->execute(array(
	    'kullanici_id' => $_GET['kullanici_id']
	));
    if($kontrol){
            header("Location:../uyeler.php?durum=okey");
    }else{
            header("Location:../uyeler.php?durum=hata");  
    }
}
// ---------------------
// Uye Kısmı bitiş
// ---------------------


// ---------------------
// Kategori Kısmı Başlangıç
// ---------------------
if(isset($_POST['ktgekle'])){
    $kaydet=$baglanti->prepare("INSERT INTO kategori SET
    kategori_adi=:kategori_adi,
    kategori_sira=:kategori_sira,
    kategori_durum=:kategori_durum");
    $update =$kaydet->execute(array(
        'kategori_adi' => $_POST['kategori_adi'],
        'kategori_sira' => $_POST['kategori_sira'],
        'kategori_durum' =>$_POST['kategori_durum']
    ));
    if($update){
        header("Location:../kategori.php?durum=okey");
    }else{
        header("Location:../kategori.php?durum=hata");  
    }
}


if(isset($_POST['kategoriduzenle'])){
   
    $kategori_id=$_POST['kategori_id'];
    
    $kaydet=$baglanti->prepare("UPDATE kategori SET
    kategori_adi=:kategori_adi,
    kategori_sira=:kategori_sira,
    kategori_durum=:kategori_durum
    where kategori_id={$kategori_id}");
    $update =$kaydet->execute(array(
        'kategori_adi' => $_POST['kategori_adi'],
        'kategori_sira' => $_POST['kategori_sira'],
        'kategori_durum' =>$_POST['kategori_durum']
    ));
    if($update){
        header("Location:../kategori.php?durum=okey");
    }else{
        header("Location:../kategori.php?durum=hata");  
    }
}
if(@$_GET["kategorisil"]=="ok"){
    $sil=$baglanti->prepare("DELETE from kategori where kategori_id=:kategori_id");
	$kontrol=$sil->execute(array(
	    'kategori_id' => $_GET['kategori_id']
	));
    if($kontrol){
            header("Location:../kategori.php?durum=okey");
    }else{
            header("Location:../kategori.php?durum=hata");  
    }
}
// ---------------------
// Kategori Kısmı Bitiş
// ---------------------

// ---------------------
// Slider Kısmı Başlangıç
// ---------------------
if(isset($_POST['sliderekle'])){
    print_r($_POST);
    $uploads_dir="../resimler/slider";
    @$tmp_name=$_FILES['logo']["tmp_name"];
    @$name = $_FILES['logo']["name"];

    $sayi = rand(1,100000);
    $sayi2 = rand(1,100000);
    $sayi3 = rand(10000,2000000);

    $sayilar =$sayi.$sayi2.$sayi3;
    $resimyol = $sayilar.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");
   

    $kaydet=$baglanti->prepare("INSERT INTO slider SET
    slider_baslik=:slider_baslik,
    slider_aciklama=:slider_aciklama,
    slider_sira=:slider_sira,
    slider_link=:slider_link,
    slider_durum=:slider_durum,
    slider_banner=:slider_banner,
    slider_button_yazi=:slider_button_yazi,
    slider_resim=:slider_resim");
    $update =$kaydet->execute(array(
        'slider_baslik' => $_POST['slider_baslik'],
        'slider_aciklama' => $_POST['slider_aciklama'],
        'slider_sira' =>$_POST['slider_sira'],
        'slider_link' =>$_POST['slider_link'],
        'slider_durum' =>$_POST['slider_durum'],
        'slider_banner' =>$_POST['slider_banner'],
        'slider_button_yazi' =>$_POST['slider_button_yazi'],
        'slider_resim' =>$resimyol
    ));
    if($update){
        header("Location:../slider.php?durum=okey");
       }else{
        header("Location:../slider.php?durum=hata");  
      }
   
}

if(isset($_POST['sliderduzenle'])){
     if($_FILES["logo"]["size"]>0) {
        $uploads_dir="../resimler/slider";
        @$tmp_name=$_FILES['logo']["tmp_name"];
        @$name = $_FILES['logo']["name"];

        $sayi = rand(1,100000);
        $sayi2 = rand(1,100000);
        $sayi3 = rand(10000,2000000);

        $sayilar =$sayi.$sayi2.$sayi3;
        $resimyol = $sayilar.$name;
        @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");
        
        $sliderid = $_POST['slider_id'];

        $kaydet=$baglanti->prepare("UPDATE slider SET
        slider_baslik=:slider_baslik,
        slider_aciklama=:slider_aciklama,
        slider_sira=:slider_sira,
        slider_link=:slider_link,
        slider_durum=:slider_durum,
        slider_banner=:slider_banner,
        slider_button_yazi=:slider_button_yazi,
        slider_resim=:slider_resim
        where slider_id={$sliderid}");
        $update =$kaydet->execute(array(
            'slider_baslik' => $_POST['slider_baslik'],
            'slider_aciklama' => $_POST['slider_aciklama'],
            'slider_sira' =>$_POST['slider_sira'],
            'slider_link' =>$_POST['slider_link'],
            'slider_button_yazi' =>$_POST['slider_button_yazi'],
            'slider_durum' =>$_POST['slider_durum'],
            'slider_banner' =>$_POST['slider_banner'],
            'slider_resim' =>$resimyol
        ));
         if($update){
             $resimsil = $_POST['eskilogo'];
             unlink("../resimler/slider/$resimsil");
             header("Location:../slider.php?durum=okey");
         }else{
             header("Location:../slider.php?durum=hata");  
         }
        }else{
        $sliderid = $_POST['slider_id'];
        $kaydet=$baglanti->prepare("UPDATE slider SET
        slider_baslik=:slider_baslik,
        slider_aciklama=:slider_aciklama,
        slider_sira=:slider_sira,
        slider_link=:slider_link,
        slider_durum=:slider_durum,
        slider_banner=:slider_banner,
        slider_button_yazi=:slider_button_yazi
        where slider_id={$sliderid}");
        $update =$kaydet->execute(array(
            'slider_baslik' => $_POST['slider_baslik'],
            'slider_aciklama' => $_POST['slider_aciklama'],
            'slider_sira' =>$_POST['slider_sira'],
            'slider_link' =>$_POST['slider_link'],
            'slider_button_yazi' =>$_POST['slider_button_yazi'],
            'slider_durum' =>$_POST['slider_durum'],
            'slider_banner' =>$_POST['slider_banner'],
            
        ));
        if($update){
            header("Location:../slider.php?durum=okey");
        }else{
            header("Location:../slider.php?durum=hata");  
         }
        }
}

// ---------------------
// Slider Kısmı Bitiş
// ---------------------

// ---------------------
// Kullanıcı Girş Başlangıç
// ---------------------
if(isset($_POST['login'])){
      $kulladi= htmlspecialchars($_POST['kulladi']);
      $kullsifre= htmlspecialchars($_POST['kullsifre']);
      $kullpw=md5($kullsifre);
      $kullanicisor= $baglanti->prepare("SELECT * FROM kullanici where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre and kullanici_yetki=:kullanici_yetki");
      $kullanicisor->execute(array(
        'kullanici_adi'=>$kulladi,
        'kullanici_sifre'=>$kullpw,
        'kullanici_yetki' =>0
      ));
      $var=$kullanicisor->rowCount();
      if($var>0){
        $_SESSION['normalgiris']=$kulladi;
        header("Location:../../index?durum=okey");
      }else{
        header("Location:../../giris?durum=hata");
      }
}
if(isset($_POST['register'])){
      $kadi=htmlspecialchars($_POST['kadi']);
      $kmail=htmlspecialchars($_POST['kmail']);
      $kuadi=htmlspecialchars($_POST['kuadi']);
      $ksifre=htmlspecialchars($_POST['ksifre']);
      $ksifre2=htmlspecialchars($_POST['ksifre2']);
      $kullanicisor= $baglanti->prepare("SELECT * FROM kullanici where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki");
      $kullanicisor->execute(array(
        'kullanici_adi'=>$kuadi,
        'kullanici_yetki' =>0
      ));
      $var=$kullanicisor->rowCount();
      if($var>0){
        header("Location:../../giris?durum=var");
      }else{
          if($ksifre==$ksifre2){
             if(strlen($ksifre)>=8 and strlen($ksifre2)>=8){
                $gucmd=md5($ksifre);
                $kaydet=$baglanti->prepare("INSERT INTO kullanici SET
                kullanici_adsoyad=:kullanici_adsoyad,
                kullanici_adi=:kullanici_adi,
                kullanici_sifre=:kullanici_sifre,
                kullanici_mail=:kullanici_mail,
                kullanici_yetki=:kullanici_yetki");
                $update =$kaydet->execute(array(
                    'kullanici_adsoyad' => $_POST['kadi'],
                    'kullanici_adi' => $_POST['kuadi'],
                    'kullanici_sifre' =>$gucmd,
                    'kullanici_mail' =>$_POST['kmail'],
                    'kullanici_yetki' =>0));
                    if($update){
                        header("Location:../../index?durum=okey");
                    }else{
                        header("Location:../../giris?durum=hata");
                    }
             }else{
                header("Location:../../giris?durum=uzunaz");
             }

          }else{
             header("Location:../../giris?durum=farkli");
          
      }
      
}

}
// ---------------------
// Kullanıcı Girş Bitiş
// ---------------------

// ---------------------
// Ürün Ekle Girş 
// ---------------------
if(isset($_POST['urunekle'])){
    print_r($_POST);
    $yonlendir=$_POST['kategori_id'];
        $uploads_dir="../resimler/urunler";
        @$tmp_name=$_FILES['logo']["tmp_name"];
        @$name = $_FILES['logo']["name"];

        $sayi = rand(1,100000);
        $sayi2 = rand(1,100000);
        $sayi3 = rand(10000,2000000);

        $sayilar =$sayi.$sayi2.$sayi3;
        $resimyol = $sayilar.$name;
        @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");

        $kaydet=$baglanti->prepare("INSERT INTO urunler SET
        kategori_id=:kategori_id,
        urun_baslik=:urun_baslik,
        urun_anahtar=:urun_anahtar,
        urun_aciklama=:urun_aciklama,
        urun_sira=:urun_sira,
        urun_model=:urun_model,
        urun_renk=:urun_renk,
        urun_adet=:urun_adet,
        urun_fiyat=:urun_fiyat,
        urun_onecikar=:urun_onecikar,
        urun_durum=:urun_durum,
        urun_resim=:urun_resim
        ");
        $update=$kaydet->execute(array(
            'kategori_id' => $_POST['kategori_id'],
            'urun_baslik' => $_POST['urun_baslik'],
            'urun_anahtar' => $_POST['urun_anahtar'],
            'urun_aciklama' => $_POST['urun_aciklama'],
            'urun_sira' => $_POST['urun_sira'],
            'urun_model' => $_POST['urun_model'],
            'urun_renk' => $_POST['urun_renk'],
            'urun_adet' => $_POST['urun_adet'],
            'urun_fiyat' => $_POST['urun_fiyat'],
            'urun_onecikar' => $_POST['urun_onecikar'],
            'urun_durum' => $_POST['urun_durum'],
            'urun_resim' =>$resimyol
        ));
        if($update){
            header("Location:../urunler?katid=$yonlendir&durum=okey");
        }else{
            header("Location:../urunler?katid=$yonlendir&durum=hata");
        }
    
   
}

if(isset($_POST['urunduzenle'])){
    $yonlendir=$_POST['kategori_id'];
     if($_FILES["logo"]["size"]>0) {
        $uploads_dir="../resimler/urunler";
        @$tmp_name=$_FILES['logo']["tmp_name"];
        @$name = $_FILES['logo']["name"];

        $sayi = rand(1,100000);
        $sayi2 = rand(1,100000);
        $sayi3 = rand(10000,2000000);

        $sayilar =$sayi.$sayi2.$sayi3;
        $resimyol = $sayilar.$name;
        @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");

        $kaydet=$baglanti->prepare("UPDATE urunler SET
        kategori_id=:kategori_id,
        urun_baslik=:urun_baslik,
        urun_anahtar=:urun_anahtar,
        urun_aciklama=:urun_aciklama,
        urun_sira=:urun_sira,
        urun_model=:urun_model,
        urun_renk=:urun_renk,
        urun_adet=:urun_adet,
        urun_fiyat=:urun_fiyat,
        urun_onecikar=:urun_onecikar,
        urun_durum=:urun_durum,
        urun_resim=:urun_resim 
        WHERE urun_id={$_POST['urun_id']}
        ");
        $update=$kaydet->execute(array(
            'kategori_id' => $_POST['kategori_id'],
            'urun_baslik' => $_POST['urun_baslik'],
            'urun_anahtar' => $_POST['urun_anahtar'],
            'urun_aciklama' => $_POST['urun_aciklama'],
            'urun_sira' => $_POST['urun_sira'],
            'urun_model' => $_POST['urun_model'],
            'urun_renk' => $_POST['urun_renk'],
            'urun_adet' => $_POST['urun_adet'],
            'urun_fiyat' => $_POST['urun_fiyat'],
            'urun_onecikar' => $_POST['urun_onecikar'],
            'urun_durum' => $_POST['urun_durum'],
            'urun_resim' =>$resimyol
        ));
             if($update){
                $resimsil = $_POST['eskiresim'];
                unlink("../resimler/urunler/$resimsil");
                header("Location:../urunler?katid=$yonlendir&durum=okey");
             }else{
                 header("Location:../urunler?katid=$yonlendir&durum=okey");
             }
        }else{
            $kaydet=$baglanti->prepare("UPDATE urunler SET
            kategori_id=:kategori_id,
            urun_baslik=:urun_baslik,
            urun_anahtar=:urun_anahtar,
            urun_aciklama=:urun_aciklama,
            urun_sira=:urun_sira,
            urun_model=:urun_model,
            urun_renk=:urun_renk,
            urun_adet=:urun_adet,
            urun_fiyat=:urun_fiyat,
            urun_onecikar=:urun_onecikar,
            urun_durum=:urun_durum WHERE urun_id={$_POST['urun_id']}
        ");
        $update=$kaydet->execute(array(
            'kategori_id' => $_POST['kategori_id'],
            'urun_baslik' => $_POST['urun_baslik'],
            'urun_anahtar' => $_POST['urun_anahtar'],
            'urun_aciklama' => $_POST['urun_aciklama'],
            'urun_sira' => $_POST['urun_sira'],
            'urun_model' => $_POST['urun_model'],
            'urun_renk' => $_POST['urun_renk'],
            'urun_adet' => $_POST['urun_adet'],
            'urun_fiyat' => $_POST['urun_fiyat'],
            'urun_onecikar' => $_POST['urun_onecikar'],
            'urun_durum' => $_POST['urun_durum']
        ));
             if($update){
             header("Location:../urunler?katid=$yonlendir&durum=okey");
             }else{
              header("Location:../urunler?katid=$yonlendir&durum=hata");
             }
        }
        
}
    if(isset($_GET['urunsil'])=="ok"){
        print_r($_GET);
        $yonlendir=$_GET['kategori_id'];
        $kaydet=$baglanti->prepare("DELETE FROM urunler where urun_id={$_GET['urun_id']}");
        $update=$kaydet->execute();
        if($update){
            $resimsil = $_GET['urun_resim'];
            unlink("../resimler/urunler/$resimsil");
            header("Location:../urunler?katid=$yonlendir&durum=okey");
        }else{
            header("Location:../urunler?katid=$yonlendir&durum=hata");
        }
     

    }

// ---------------------
// Ürün Ekle Bitiş
// ---------------------
?>