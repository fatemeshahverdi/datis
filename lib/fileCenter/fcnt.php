<?php
$ini=parse_ini_file("fcnt.ini",true) or die("Error :ini");
//var_dump($_POST);
define("BaseDir", $ini['location']['dir']);
define("BaseUrl", $ini['location']['url']);
$rootDir=BaseDir;
$rootUrl=BaseUrl;
$temp=array();
if(isset($_GET['dir']) && $_GET['dir']!="" &&( $ini['access']['all']==1 ||(substr_count($_GET['dir'], "..")==substr_count(BaseDir, "..") && substr($_GET['dir'],0,strlen(BaseDir))==BaseDir )))
{
    $rootUrl=str_replace(BaseDir, BaseUrl, $_GET['dir']);
    $rootDir=$_GET['dir'];
    $temp=substr($rootDir, strlen(BaseDir));
    $temp=explode("/", $temp);
    array_shift($temp);
}
if(isset($_GET['del']) && $_GET['del']!="")
{
    if(file_exists($rootDir."/".$_GET['del']))
    {
        unlink($rootDir."/".$_GET['del']);
    }
}
    
if($ini['upload']['active']==1 && isset($_FILES['file']))
{
    ( $_FILES['file']['error']==0)or die ("Error:".$_FILES['file']['error']);
    $allowedExts = explode(",", $ini['upload']['file']);
    $extension = strtolower( end(explode(".", $_FILES["file"]["name"])));
    if ( ($_FILES["file"]["size"] < (int)$ini['upload']['size'])  && in_array($extension, $allowedExts))
    {
//        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
//        echo "Type: " . $_FILES["file"]["type"] . "<br>";
//        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//        echo "Stored in: " . $_FILES["file"]["tmp_name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],$rootDir."/" .urlencode( $_FILES["file"]["name"]));
        //header("location: .");
    }
    else
    {
        echo "Invalid file";
    }
}
$dh=  opendir($rootDir);
?>
<div class="dirView">
            <p class="dvTitle"><?php echo "<a href='javascript:o.link(\"?dir=".BaseDir."\");'>Home</a>";
            foreach ($temp as $k=> $v)
            {
                echo "&nbsp;|&nbsp;<a href='javascript:o.link(\"?dir=".BaseDir."/".  join("/", array_slice($temp,0,$k+1))."\");'>". $v."</a>";
            }
                    ?></p>
            <table class="dvTable">
                <thead><tr><th>name</th><th>type</th><th>size</th><th>path</th><th>pic</th><th>delete</th></tr></thead>
                <tbody>
                    <?php
                    $fn=$n=0;
                    while ($f=  readdir($dh))
                    {
                        if($f!="." && $f!="..")
                        {
                            $n++;
                            echo "<tr class='".($n%2?"orow":"erow")."'>";
                            if($ini['access']['dir']==1 && is_dir($rootDir."/".$f))
                            {
                                echo "<td><a href='javascript:o.link(\"?dir=".$rootDir."/".$f."\");'>". $f."</a></td><td>dir</td><td></td><td></td><td></td><td></td>";
                            }
                            else if($ini['access']['file']==1 && is_file($rootDir."/".$f))
                            {
                                $fn++;
                                $info= pathinfo($rootDir."/".$f);
                                $info['extension']=  isset($info['extension'])?$info['extension']:"";
                                $ext=  explode(",", $ini['access']['image']);
                                echo "<td>". urldecode($f)."</td><td>".$info['extension']."</td><td>".  round(filesize($rootDir."/".$f)/1024,2)."&nbsp;KB</td><td><input value='".  $rootUrl."/".urlencode($f)."'></td>";
                                if(array_search( strtolower($info['extension']), $ext)>-1)
                                {
                                    echo "<td><img src='".$rootUrl."/".urlencode($f)."'></td>";
                                }
                                else
                                {
                                    echo "<td></td>";
                                }
                                echo "<td><a href='javascript:o.delete(\"?dir=".$rootDir."&del=".$f."\")'>X</a></td>";
                            }
                            echo "</tr>";
                        
                        }
                    }
                    ?>
                </tbody>
                <tfoot><tr><th colspan="6">files:<?php echo $fn; ?></th></tr></tfoot>
            </table>
        </div>
        <?php
        if($ini['upload']['active']==1)
        {
        ?>
        <div class="uploader">
            <form method="Post" enctype="multipart/form-data" id="formf">
                <p><label for="file"></label><input id="file" name="file" type="file"><input value="بارگذاری" type="button" name="uploader" onclick="javascript:var fd= new  FormData();var file=document.getElementById('file').files[0];fd.append('file',file,file.name);;o.upload('?dir=<?php echo($rootDir); ?>',fd);"></p> 
             </form>
        </div>
        <?php
        }
        ?>