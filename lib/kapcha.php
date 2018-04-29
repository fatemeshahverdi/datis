<?php
session_status()==PHP_SESSION_ACTIVE or session_start();

function createImage()
{
header("content-type:image/png");
$image=imagecreatetruecolor(150,50);
$word="";
$r=rand(196,255);
$g=rand(196,255);
$b=rand(196,255);
$back=imagecolorallocate($image,$r,$g,$b);
imagefilledrectangle($image,0,0,150,50,$back);
$color1=imagecolorallocate($image,95,0,176);
$color2=imagecolorallocate($image,95,67,0);
$color3=imagecolorallocate($image,0,95,85);
$color4=imagecolorallocate($image,0,95,255);
$color5=imagecolorallocate($image,100,100,100);
$color6=imagecolorallocate($image,0,0,0);
$co=array($color1,$color2,$color3,$color4);
for($i=0;$i<4;$i++)
{
    imageline($image,rand()%150,rand()%50,rand()%150,rand()%50,$co[$i]);
}
for($i=0;$i<20;$i++)
{
    imagesetpixel($image,rand()%150,rand()%50,$color6);
}
$letters='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
$len=strlen($letters);
$_SESSION['kapcha']="";
for($j=0;$j<5;$j++)
{
$letter=$letters[rand(0,$len-1)];
$_SESSION['kapcha'].=$letter;
imagestring($image,rand(3,7),6+($j*rand(20,30)),rand(0,35),$letter,$color6);
$word.=$letter;
}
$_SESSION['capchaString']=$word;
imagepng($image);
}

createImage();
     
?>

