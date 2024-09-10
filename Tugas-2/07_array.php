<?php
    // Nama : 
    // NIM  : 
    
    // NUMERIC ARRAY********************************************
    echo '<br />NUMERIC ARRAY<br />';
    //assignment melalui array identifier
    for ($i=0;$i<10;$i++){
        $diskon[] = $i * 5;
    }

    //assignment menggunakan fungsi array
    // $diskon = array(0,10,20,30,40,50,60,70,80,90);
    
    //cek apakah sebuah variabel bertipe array
    if (is_array($diskon)){
        echo 'Array <br/>';
    } else{
        echo 'Not Array <br/';
    }

    //menampilkan isi array
    $n = sizeof($diskon);
    for($i=0;$i<=($n-1);$i++){
        echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
    }

    // Percobaan 1 ============================================= 
    $disc = array(60,20,50,90,0,70,10,30,80,40);

    // TODO urutkan array disc tersebut dengan menggunakan ksort()
    ksort($disc);
    echo 'ksort 1 <br>';
    print_r($disc); 
    echo '<br/>';
    
    $n = sizeof($disc);
    
    // Mengonversi array menjadi numerik
    $disc_sorted = array_values($disc);
    
    for ($i=0; $i<$n; $i++){
        echo $disc_sorted[$i].'<br />';
    }
    
    // TODO urutkan array disc tersebut dengan menggunakan asort()
    asort($disc);
    echo 'asort 1 <br>';
    print_r($disc); 
    echo '<br/>';
    
    $n = sizeof($disc);
    
    // Mengonversi array menjadi numerik
    $disc_sorted = array_values($disc);
    
    for ($i=0; $i<$n; $i++){
        echo $disc_sorted[$i].'<br />';
    }
    
    

    // TODO urutkan array disc tersebut dengan menggunakan sort()
    sort($disc);
    print_r($disc); 
    echo '<br> sort 1 <br>';
    echo '<br/>';
    for ($i=0; $i<$n; $i++){
        echo $disc[$i].'<br />';
    }

    // ASSOSIATIVE ARRAY********************************************
    echo '<br />ASSOSIATIVE ARRAY<br />';
    //assignment menggunakan fungsi array
    $bulan = array('jan' => 'Januari', 
        'feb' => 'Februari',
        'mar' => 'Maret',
        'apr' => 'April',
        'mei' => 'Mei',
        'jun' => 'Juni',
        'jul' => 'Juli',
        'agu' => 'Agustus',
        'sep' => 'Sepetember',
        'okt' => 'Oktober',
        'nov' => 'November',
        'des' => 'Desember');
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // Percobaan 2 =============================================     
    // TODO urutkan array bulan tersebut dengan menggunakan ksort()
    echo'<br>';
    ksort($bulan);
    echo 'ksort 2 <br>';
    echo '<br/>';
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // TODO urutkan array bulan tersebut dengan menggunakan asort()
    echo'<br>';
    asort($bulan);
    echo 'asort 2 <br>';
    echo '<br/>';
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // TODO urutkan array bulan tersebut dengan menggunakan sort()
    echo'<br>';
    sort($bulan);
    echo 'sort 2 <br>';
    echo '<br/>';
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

?>