<?php
require_once(APPPATH.'vendor/mike42/escpos-php/autoload.php');
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    $date = date('d-M-Y H:i:s');  
        $connector = new WindowsPrintConnector("POS58");
        // $logo = EscposImage::load("./assets/img/logo.png", false);
        $printer = new Printer($connector);
        $printer -> initialize();
                  $testStr = ($cetak[0]['kd_siparis']);
    $sizes = array(
     15 => "(maximum)");
    foreach ($sizes as $size => $label) {
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> qrCode($testStr, Printer::QR_ECLEVEL_L, $size);
    $printer -> text($cetak[0]['kd_siparis']);
    $printer -> setJustification();
}
    $printer -> feed(1);      
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        // $printer -> bitImage($logo);
        $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer -> text("BTBS\n");
        $printer -> selectPrintMode();
        $printer -> text("Jl. Meruya Ilir Raya\n");
        $printer -> text("Srengseng - Kembangan\n");
        $printer -> text("Jakarta Barat\n");
        $printer -> text("================================\n");
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> text("No Order    : ");
        $printer -> text($cetak[0]['kd_siparis']);
        $printer -> feed();
        $printer -> text("Customer Name : ");
        $printer -> text($cetak[0]['nama_temp']);
        $printer -> feed();
        $printer -> text("--------------------------------\n"); 
        /* Title of receipt */
        $printer -> setEmphasis(true);
        $printer -> text("Information                Total");
        $printer -> setEmphasis(false);
        foreach ($cetak as $i) {
        $printer -> feed();
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> text($i['kd_tiket']);
        $printer -> feed();
        $printer -> text($i['kd_zaman']   );
        $printer -> text("      ");
        $printer -> text($i['fiyat_bilet']);
        // $printer -> text("      ");        
        // $printer -> text($diskon=$i['d_jual_diskon'])."";
        $printer -> text("      ");
        $printer -> text($i['fiyat_bilet']);
        }
        $printer -> feed();
        $printer -> text("--------------------------------\n");
        // $printer -> setJustification(Printer::JUSTIFY_RIGHT);
        $printer -> setEmphasis(true);
        $printer -> text("Total     :              ");
        if (count($cetak) == '2') { $total = $cetak[0]['fiyat_bilet'] + $cetak[0]['fiyat_bilet'] ;;
                                            }else{ $total = $cetak[0]['fiyat_bilet'] ;}
        $printer -> text($total);
        $printer -> setEmphasis(false);
        $printer -> feed();
        $printer -> text("--------------------------------\n");
        $printer -> feed();
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer -> text("Thank you \n");
        $printer -> text($date . "\n");
        $printer -> feed();

        
        $printer -> cut();
        $printer -> pulse();
        $printer -> close();
    $printer -> close();
        redirect('tiket/biletlerim/'.$cetak[0]['kd_musteri']);