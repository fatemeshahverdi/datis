/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var doc=document,A,B,C,c,r,P;
window.onload=function (){var t=doc.createElement("style");t.innerHTML=".dirView a{color:#fff} .dirView{ background-color:#333; padding:20px 0;height:400px; overflow:auto;} .uploader{text-align:center;background-color:#fff;width: 500px; margin: 50px auto;border: 1px black solid; min-height: 50px;max-height: 400px; overflow: auto;}.dvTitle{text-align: center;}.dvTable{border:1px black solid; margin: 0 auto 20px;padding: 0px; background-color: #000;border-collapse: collapse;}.orow{background-color: #fff;}.erow{background-color: #ddd;}  .dvTable td,.dvTable th{padding:0 10px; } .dvTable a{text-decoration: none; color:blue;} .dvTable thead,.dvTable tfoot{background-color: skyblue;}.dvTable thead,.dvTabletbody,.dvTabletfoot,.dvTabletr,.dvTabletd,.dvTableth{margin: 0px;padding: 5px; max-width: 250px; text-wrap: none;}.dvTable img{max-width: 100px;}.fcntWrapper{position: fixed;width: 0%;height: 100%;z-index: 1000;left:0;top:0;background-color:rgba(0,0,0,0.4);overflow: hidden;}";doc.head.appendChild(t);
    t=doc.createElement("div"); t.className="fcntWrapper"; doc.body.appendChild(t);c=t;
    t=doc.createElement("p");t.className="dvTitle"; t.id="exit"; t.onclick=function(){};t.innerHTML="<input type='button' style='font-size:2em;cursor:pointer;' value='Exit' onclick='c.style.width=\"0%\";'>"; c.appendChild(t);
    t=doc.createElement("div"); t.id="fcntC"; c.appendChild(t);C=t;
    t=doc.getElementById(linkID?linkID:"fcntA");t.onclick=function (){c.style.width="100%";r.open("post",P,true);r.send();};
    r=new XMLHttpRequest();r.onreadystatechange=function(){C.innerHTML=(r.readyState==4 && r.status==200)?r.responseText:C.innerHTML;};
    P=doc.getElementById("fcntS").src.replace("fcnt.js","fcnt.php");
};
var o=new function(){this.link=function (){r.open("Post",P+arguments[0],true);r.send()};this.upload=function (){r.open("Post",P+arguments[0],true);r.send(arguments[1]);};this.delete=function (){if(window.confirm("Delete this file?"))  { r.open("Post",P+arguments[0],true);r.send();}};};