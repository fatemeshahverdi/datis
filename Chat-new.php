<?php
if(isset($_GET['part']))
{
    $re3;
    session_status()==PHP_SESSION_ACTIVE or session_start();
    require_once './lib/dbc.php';
    $idCu=  isset($_SESSION['id'])?$_SESSION['id']:$_SESSION['chat'];
    $_SESSION['idU']=isset($_SESSION['idU'])?$_SESSION['idU']:1;
    if(!isset($_SESSION['pre']))
    {
       $_SESSION['pre']=Q("select c.*,u.name from chat as c,users as u where c.`idUser`=u.id and c.idCustomer='".$idCu."' and (c.writer=1 or c.`read`=1) order by c.id desc limit 50");
       $s="";
       while ($row2=mysql_fetch_array($_SESSION['pre']))
       {
           if($row2["writer"]==0)
            {
                $s="<p class='chatTit1'>".$row['name']."</p><p class='msg1'>".$row2['msg']."</p>".$s;
            }
        else if($row2["writer"]==1)
            {
                
                $s="<p class='chatTit2'>".$_SESSION['userName1']."</p><p class='msg2'>".$row2['msg']."</p>".$s;
            } 
       }
       $_SESSION['pre']=$s;
    }
    //unset($_SESSION['pre']);
    $re2=Q("select c.*,u.name from chat as c,users as u where c.`idUser`=u.id and c.`read`=0 and c.writer=0 and c.idCustomer='".$idCu."'");
    if($_GET['part']=="chat")
    {
        if(mysql_num_rows($re2)<1)
        {
  
        }
        else
        {
            
            $d="";
            while($row=mysql_fetch_array($re2))
            {
                
                $d=$d."<p class='chatTit1'>".$row['name']."</p><p class='msg1'>".$row['msg']."</p>";
                $_SESSION['idU']=$row['idUser'];
                Q("update chat set `read`=1 where writer=0 and `read`=0 and idCustomer='".$idCu."'");

            }
            echo "chat$$".$d;
        }
        if(isset($_GET['str']))
        {
            Q("insert into chat (`idUser`,idCustomer,start,msg,time,writer,`read`) values (".$_SESSION['idU'].",'".$idCu."',0,'".$_GET['str']."',".time().",1,0)");
            echo "chat$$<p class='chatTit2'>".$_SESSION['userName1']."</p><p class='msg2'>".$_GET['str']."</p>";
        }
    }
    else if($_GET['part']=="history")
    {
        
        echo ("history$$".$_SESSION['pre']);
        
    }
}

?>