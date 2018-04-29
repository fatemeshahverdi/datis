<script>
//    var xmlhttp2;
//    if(window.XMLHttpRequest)
//    {
//        xmlhttp2=new XMLHttpRequest("window.XMLHTTP");
//    }
//    else
//    {
//        xmlhttp2=new ActiveXobject("Microsoft.XMLHTTP");
//    }
//    xmlhttp2.onreadystatechange=function ()
//    {
//        if(xmlhttp2.readyState==4 && xmlhttp2.status==200)
//        {
//            var t4=document.getElementById("noti");
//            t4.innerHTML=xmlhttp2.responseText;
//            
//        }
//    }
//    function notification ()
//    {
//        xmlhttl2.open("get","testNotification.php",true);
//        xmlhttp2.send();
//    }
//    var w=window.onload;
//    window.onload=function ()
//    {
//        if(w!=null)
//        {
//           w();
//        }
//        notification();
//        setInterval('notification()',1000);
//    }
</script>
</div>
            </div>
<div id="nav1">
    <?php
                echo (2&(int)$_SESSION['level'])? '<p><a href="viewRegister.php">مدیریت اعضا</a></p>':"";
                echo (4&(int)$_SESSION['level'])? '<p><a href="./viewNews.php">اخبار</a></p>':"";
                echo (8&(int)$_SESSION['level'])? '<p><a href="./viewArticles.php">مقالات</a></p>':"";
                echo (16&(int)$_SESSION['level'])? '<p><a href="./describes.php">معرفی</a></p>':"";
                echo (32&(int)$_SESSION['level'])? '<p><a href="./viewComments.php">پیشنهادات و انتقادات</a></p>':"";
                echo (64&(int)$_SESSION['level'])? '<p><a href="./viewRecruitments.php">جذب نیرو</a></p>':"";
                echo (128&(int)$_SESSION['level'])? '<p><a href="./manageUsers.php">مدیریت کاربران</a></p>':"";
                echo (256&(int)$_SESSION['level'])? '<p><a href="./setting.php">تنظیمات</a></p>':"";
                echo (512&(int)$_SESSION['level'])? '<p><a href="./Glass.php">شیشه آلات</a></p>':"";
                echo (1024&(int)$_SESSION['level'])? '<p><a href="./Chem.php">مواد شیمیایی</a></p>':"";
                echo (2048&(int)$_SESSION['level'])? '<p><a href="./chatSaloon.php">چت</a></p>':"";
                echo (4096&(int)$_SESSION['level'])? '<p><a href="./Email.php">ایمیل</a></p>':"";
                        ?>
                <hr>
                <p><a href="./logOut.php">خروج</a></p>
            </div>
        </div>
    </body>
</html>
