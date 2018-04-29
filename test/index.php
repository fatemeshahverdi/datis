<?php
?>
<!doctype html>
<html>
    <head>
        <style>
            @media screen
            {
                .item{ margin: 100px; background-color: blue; }
            }
            @media print
            {
                .item{ margin: 500px; background-color: green;color: red;}
            }
            
            .item{ display: inline-block; width: 100px;height: 100px;}
        </style>
    </head>
    <body>
        <div class="item">1</div>
        <div class="item">2</div>
    </body>
</html>