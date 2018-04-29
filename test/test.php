<?php
$s1=  dechex(15);
                $l=strlen($s1);
                $s2=dechex(time());
                $s=  substr($s2,strlen($s2)-(7-$l)).$s1;
                $s.=$l.substr(hash("md5", $s), 0,22);
                echo $s."<br>";
                $s=substr($s,20).substr($s, 0,20);
                echo $s;
                