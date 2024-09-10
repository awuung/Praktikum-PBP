<?php
    // Nama : Awang Pratama Putra Mulya
    // NIM  : 24060122120039 
    
    // NUMERIC ARRAY********************************************
    echo '<br />NUMERIC ARRAY<br />';
    //assignment melalui array identifier
    for ($i=0;$i<10;$i++){
        $diskon[] = $i * 5;
    }

    //assignment menggunakan fungsi array
    $diskon = array(0,10,20,30,40,50,60,70,80,90);
    
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
    echo '<br />Urutkan array disc dengan ksort():<br />';
    ksort($disc); // Mengurutkan berdasarkan key
    foreach($disc as $key => $value) {
        echo 'Key '.$key.' => '.$value.'<br />';
    }

    // TODO urutkan array disc tersebut dengan menggunakan asort()
    echo '<br />Urutkan array disc dengan asort():<br />';
    asort($disc); // Mengurutkan berdasarkan value dengan menjaga key
    foreach($disc as $key => $value) {
        echo 'Key '.$key.' => '.$value.'<br />';
    }

    // TODO urutkan array disc tersebut dengan menggunakan sort()
    echo '<br />Urutkan array disc dengan sort():<br />';
    sort($disc); // Mengurutkan berdasarkan value dan reset key
    foreach($disc as $value) {
        echo $value.'<br />';
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
    echo '<br />Urutkan array bulan dengan ksort():<br />';
    ksort($bulan); // Mengurutkan berdasarkan key
    foreach($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // TODO urutkan array bulan tersebut dengan menggunakan asort()
    echo '<br />Urutkan array bulan dengan asort():<br />';
    asort($bulan); // Mengurutkan berdasarkan value (nama bulan)
    foreach($bulan as $kode_bulan => $nama_bulan) {
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // TODO urutkan array bulan tersebut dengan menggunakan sort()
    echo '<br />Urutkan array bulan dengan sort():<br />';
    sort($bulan); // Mengurutkan berdasarkan value dan reset key
    foreach($bulan as $nama_bulan) {
        echo 'Bulan: '.$nama_bulan.'<br />';
    }

?>