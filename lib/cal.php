<?php

/*
 * author:xani
 * website:http://webDD.ir
 */

date_default_timezone_set("iran"); 

/** Convertor from and to Gregorian and Jalali (Hijri_Shamsi,Solar) Functions
Copyright(C)2013, Reza Gholampanahi [ http://jdf.scr.ir/jdf ] version 2.55 */
/**
 * 
 * @param int $g_y
 * @param int $g_m
 * @param int $g_d
 * @param int $mod
 * @return Array|string
 */
function g2j($g_y,$g_m,$g_d,$mod=''){
 $d_4=$g_y%4;
 $g_a=array(0,0,31,59,90,120,151,181,212,243,273,304,334);
 $doy_g=$g_a[(int)$g_m]+$g_d;
 if($d_4==0 and $g_m>2)$doy_g++;
 $d_33=(int)((($g_y-16)%132)*.0305);
 $a=($d_33==3 or $d_33<($d_4-1) or $d_4==0)?286:287;
 $b=(($d_33==1 or $d_33==2) and ($d_33==$d_4 or $d_4==1))?78:(($d_33==3 and $d_4==0)?80:79);
 if((int)(($g_y-10)/63)==30){$a--;$b++;}
 if($doy_g>$b){
  $jy=$g_y-621; $doy_j=$doy_g-$b;
 }else{
  $jy=$g_y-622; $doy_j=$doy_g+$a;
 }
 if($doy_j<187){
  $jm=(int)(($doy_j-1)/31); $jd=$doy_j-(31*$jm++);
 }else{
  $jm=(int)(($doy_j-187)/30); $jd=$doy_j-186-($jm*30); $jm+=7;
 }
 return($mod=='')?array($jy,$jm,$jd):$jy.$mod.$jm.$mod.$jd;
}
/**
 *   مبدل شمسی به میلادی
 * @param int $j_y  سال به شمسی
 * @param int $j_m  ماه به شمسی
 * @param int $j_d  روز به شمسی
 * @param int $mod  [اختیاری]
 *  درصورت خالی بودن خروجی آرایه ای با سه مقدار خواهد بود
 * ودرصورت مقدار داشتن رشته ای که تاریخ را به صورت کامل و با مقدار  ارسالی جدا سازی میشود.
 * @return Array|String
 */
function j2g($j_y,$j_m,$j_d,$mod=''){
 $d_4=($j_y+1)%4;
 $doy_j=($j_m<7)?(($j_m-1)*31)+$j_d:(($j_m-7)*30)+$j_d+186;
 $d_33=(int)((($j_y-55)%132)*.0305);
 $a=($d_33!=3 and $d_4<=$d_33)?287:286;
 $b=(($d_33==1 or $d_33==2) and ($d_33==$d_4 or $d_4==1))?78:(($d_33==3 and $d_4==0)?80:79);
 if((int)(($j_y-19)/63)==20){$a--;$b++;}
 if($doy_j<=$a){
  $gy=$j_y+621; $gd=$doy_j+$b;
 }else{
  $gy=$j_y+622; $gd=$doy_j-$a;
 }
 foreach(array(0,31,($gy%4==0)?29:28,31,30,31,30,31,31,30,31,30,31) as $gm=>$v){
  if($gd<=$v)break;
  $gd-=$v;
 }
 return($mod=='')?array($gy,$gm,$gd):$gy.$mod.$gm.$mod.$gd;
}

/**
 * calculate date by jalali (hejri-solary) date. start date 1280/9/24(1901-12-15) end 1416/10/30(2038-01-19)
 * @param int $time timestamp  [optional]
 * @return array 0=>year , 1=> month , 2=>day , 3=> hour , 4=>minute , 5 =>second
 */
function jdate($time= NULL)
{
    if($time===NULL)
    {
        $time=  time();
    }
    $a=  g2j((int)  date("Y",$time), (int)  date("m",$time), (int)  date("d",$time));
    array_push($a,(int) date("H",$time));
    array_push($a,(int) date("i",$time));
    array_push($a,(int) date("s",$time));
    return $a;
}


function jtime($Y,$m,$d,$H=0,$i=0,$s=0)
{
    $a=  j2g($Y, $m, $d,"-");
    return strtotime($a." ".$H.":".$i.":".$s);
}

function jvalid($Y,$m,$d,$H=0,$i=0,$s=0)
{
    $a=  j2g($Y, $m, $d);
    $a=  g2j($a[0], $a[1], $a[2]);
    return($a[0]==$Y &&$a[1]==$m &&$a[2]==$d);
}

?>
