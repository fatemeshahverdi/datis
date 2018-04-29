<?php
$lvl=11;
        session_status()==PHP_SESSION_ACTIVE or session_start();
if(isset($_GET['part']) && isset($_SESSION['idU']))
{ 
    require_once '../lib/dbc.php';
        $re1=Q("select r.work as w,c.idCustomer as id from register as r,(select distinct idCustomer from chat where `read`=0 and writer=1 and `idUser`=".$_SESSION['idU'].") as c where convert(c.idCustomer , signed integer)=r.id",__LINE__,__FILE__);

       
       if(mysql_num_rows($re1)<1)
       {
           
       }
    else 
       {
           $d="";
           
           while($row=mysql_fetch_array($re1))
           {
               $c=$row['id'];
               
               $d=$d."<p style='direction:rtl;' onclick='openWin(\"$c\");'>".$row['w']."</p>";
               
           }
           echo $d;
       }
}
?>

