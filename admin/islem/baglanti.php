<?php
try{
    $baglanti = new PDO("mysql:host=localhost;dbname=eticarett",'root','12345678');
    
}
catch(PDOException $E){
    echo $E->getMessage();
}



?>