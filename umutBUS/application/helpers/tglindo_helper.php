<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('tgl_indo')){

  function tgl_indo($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = getBulan(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
  }
  function tanggal_indo($tanggal){
  $bulan = array (1 =>   'Ocak',
        'Şubat',
        'Mart',
        'Nisan',
        'Mayıs',
        'Haziran',
        'Temmuz',
        'Ağustos',
        'Eylül',
        'Ekim',
        'Kasım',
        'Aralık'
      );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  }
  function hari_indo($day){
    $hari = array ( 1 =>    'Pazartesi',
      'Salı',
      'Çarşamba',
      'Perşembe',
      'Cuma',
      'Cumartesi',
      'Pazar'
    );
    return $hari[$day];
  }
  function tanggal_ing($tanggal1){
  $bulan1 = array (1 =>   
  'Ocak',
  'Şubat',
  'Mart',
  'Nisan',
  'Mayıs',
  'Haziran',
  'Temmuz',
  'Ağustos',
  'Eylül',
  'Ekim',
  'Kasım',
  'Aralık'
      );
    $split1 = explode('-', $tanggal1);
    return $split1[2] . ' ' . $bulan1[ (int)$split1[1] ] . ' ' . $split1[0];
  }
  function hari_ing($day1){
    $hari1 = array ( 1 =>     'Pazartesi',
    'Salı',
    'Çarşamba',
    'Perşembe',
    'Cuma',
    'Cumartesi',
    'Pazar'
    );
    return $hari1[$day1];
  }
  function getBulan($bln){
    switch ($bln){
      case 1:
	    return "Ocak";
	    break;
	  case 2:
	    return "Şubat";
	    break;
	  case 3:
	    return "Mart";
	    break;
	  case 4:
	    return "Nisan";
	    break;
	  case 5:
	    return "Mayıs";
	    break;
	  case 6:
	    return "Haziran";
	    break;
	  case 7:
	    return "Temmuz";
	    break;
	  case 8:
	    return "Ağustos";
	    break;
	  case 9:
	    return "Eylül";
	    break;
	  case 10:
	    return "Ekim";
	    break;
	  case 11:
	    return "Kasım";
	    break;
	  case 12:
	    return "Aralık";
	    break;
    }
  }
  
  function tgl_str($date){
    $exp = explode('-',$date);
    if(count($exp) == 3) {
	  $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
    }
    return $date;
  }
  
  function nama_hari(){
    $seminggu = array("Pazar","Pazartesi","Salı","Çarşamba","Perşembe","Cuma","Cumartesi");
    $hari = date("w");
    $hari_ini = $seminggu[$hari];
    return $hari_ini;
  }
  function time_since($original)
{
  date_default_timezone_set('Europe/Istanbul');
  $chunks = array(
      array(60 * 60 * 24 * 365, 'year'),
      array(60 * 60 * 24 * 30, 'month'),
      array(60 * 60 * 24 * 7, 'week'),
      array(60 * 60 * 24, 'day'),
      array(60 * 60, 'hour'),
      array(60, 'minute'),
  );
 
  $today = time();
  $since = $today - $original;
 
  if ($since > 604800)
  {
    $print = date("M jS", $original);
    if ($since > 31536000)
    {
      $print .= ", " . date("Y", $original);
    }
    return $print;
  }
 
  for ($i = 0, $j = count($chunks); $i < $j; $i++)
  {
    $seconds = $chunks[$i][0];
    $name = $chunks[$i][1];
 
    if (($count = floor($since / $seconds)) != 0)
      break;
  }
 
  $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
  return $print . ' ago';
}
}
?>
