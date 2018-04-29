<?php
function checkMail ($s)
{
    if($s=="")
    {
         return "Empety Email";
    }
    $str=explode ('@',$s);
    $s=trim($s," \r\n");
    $illegal=FALSE;
    $illegal=$illegal || strpos($s, " ");
    $illegal=$illegal || strpos($s, "\t");
    $illegal=$illegal || strpos($s, "\n");
    $illegal=$illegal || strpos($s, "\r");
    $illegal=$illegal || strpos($s, "*");
    $illegal=$illegal || strpos($s, "&");
    if(count($str)!=2 || $str[0]=="" || $illegal)
    {
        return "Incorect Email";
    }
    else if(count($str)==2)
    {
      $part2=$str[1];
      $str1=explode('.',$part2);

      if(count($str1)<2)
        {

            return "Incorect Email";
        }
      else
        {
            for($i=0;$i<count($str1);$i++)
            { 
                if($str1[$i]=="")
                {
                  return "Incorect Email";
                }
            }
        }
    } 
    
    return FALSE;
}
           
?>



