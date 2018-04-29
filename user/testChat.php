<?php
$lvl=11;
require_once '../lib/dbc.php';
session_start();
if(isset($_GET['part']))
{
    if(!isset($_SESSION['preC']))
    {
        $_SESSION['preC']=Q("select * from chat where  idCustomer='".$_GET['idC']."' and (`read`=0 or writer=1) order by id desc limit 50");
        $s="";
        while ($row2=mysql_fetch_array($_SESSION['preC']))
        {
            if($row2['writer']==0)
            {
                
                $s="<p style='direction:rtl;font-size:10px;color:#888;margin-top:25px;line-height:5px;'>"."YOU"."</p><p style='direction:rtl;line-height:5px;font-size:14px;color:#888;'>".$row2['msg']."</p>".$s;
            }
            else if($row2['writer']==1)
            {
                $re3=Q("select work from register where id='".$_GET['idC']."'");
                $s="<p style='direction:ltr;font-size:10px;color:#888;margin-top:25px;line-height:5px;'>".mysql_result($re3,0,0)."</p><p style='direction:ltr;line-height:5px;font-size:14px;color:#888;'>".$row2['msg']."</p>".$s;
            }
        }
        $_SESSION['preC']=$s;
    }
    $re1=Q("select *,(select work from register where id=chat.idCustomer)as company from chat where  writer=1 and `read`=0 and idCustomer='".$_GET['idC']."' and idUser=".$_SESSION['idU'],26);
    $d="";
    if($_GET['part']=="chat")
    {
        if(mysql_num_rows($re1)<1)
        {
            
        }
        else
        {   
            while($row=mysql_fetch_array($re1))
            {
              $d=$d."<p  style='direction:ltr;line-height:5px;font-size:10px;color:#888,margin-top:25px;'>".$row['company']."</p><p style='direction:ltr;line-height:5px;font-size:14px;color:#888;'>".$row['msg']."</p>";  
              Q("update chat set `read`=1 where `read`=0 and writer=1 and idCustomer='".$_GET['idC']."' and idUser=".$_SESSION["idU"]);
            }
            echo "chat$$".$d;
            
        }
            if(isset($_GET['str']))
            {
                Q("insert into chat (idUser,idCustomer,start,msg,time,writer,`read`) values (".$_SESSION["idU"].",'".$_GET['idC']."',0,'".$_GET['str']."',".time().",0,0)",28);
                echo "chat$$"."<p style='direction:rtl;line-height:5px;font-size:10px;color:#111;margin-top:25px;'>"."YOU"."</p><p style='direction:rtl;line-height:5px;font-size:14px;color:#444;'>".$_GET['str']."</p>";
            }
        
    } 
    else if($_GET['part']=="history")
    {
        echo ("history$$".$_SESSION['preC']);
    }
}
?>
