<html>
    <head>
        <title><?php echo($ti); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
          *{font-family:tahoma;}
          #main{width:977px;margin:0 auto;border:solid 1px black ; overflow: auto;}
          #contain{width:723px;float:left;margin:0;padding:0;}
          #nav1{width:230px;height:1000px;float:right;background-color:#ccc;direction: rtl;border-left:black solid 1px;;margin:0;padding-right:20px;padding-top:80px;}
          #nav2{height:60px;background-color:#eee;border-bottom:black solid 1px;}
          p a{text-decoration:none;font-size:16px;font-weight:bold;color:#444;}
          p a:active{color:#444;}
          p a:visited{color:#444;}
          .d{direction:rtl;}
          p label{font-size:12px;}
          a{text-decoration:none;}
         .error{color:red;font-size:8px;}
         .odd{background-color:#eee;color:#333;font-size:14px;}
         .even{background-color:#fff;color:#333;font-size:14px; }
        .productTable{border-collapse: collapse; margin: 20px auto;}
        .productTable thead{background-color: skyblue;}
        .productTable tr td,.productTable tr th{border: 1px deepskyblue solid;max-width: 200px; }
        .even{background-color: #ddd;}
        .cell{width: 200px;}
        .nav{text-align: center;}
        .lbl{display: inline-block; width: 100px;}
        <?php echo isset($style)?$style:""; ?>
        </style>  
            
    </head>
    <body style="margin:0">
        <div id="main">
            <div id="contain">
                <div id="nav2" style="direction: rtl;padding-top:20px;padding-right:20px;margin-bottom:50px;">
