                
            </div>
        </div>
        <div class="footter">
            <div>
                <div class="options">
                    <div class="option">
                        <div class="optionTitle"><?php E("products") ?></div>
                        <ul><li><a href="Merck.php"><?php E("MERCK") ?></a></li><li><a href="SigmaAldrich.php"><?php E("SIGMA ALDERICH") ?></a></li><li><a href="Labware.php"><?php E("labware") ?></a></li><li><a href="./advanceSearch.php"><?php E("Advance Search") ?></a></li></ul>
                    </div>
                    <div class="option">
                        <div class="optionTitle"><?php E("information") ?></div>
                        <ul><li><a href="./develop.php"><?php E("bulk quota") ?></a></li><li><a href="./develop.php"><?php E("alphabetical index") ?></a></li><li><a href="./develop.php">CAS <?php E("index") ?></a></li><li><a href="./specification.php"><?php E("specification of analysis") ?>(<abbr title="specification of analysis">SOA</abbr>)</a></li></ul>
                    </div>
                    <div class="option">
                        <div class="optionTitle"><?php E("contact") ?></div>
                        <div style="padding: 5%;"><?php echo implode("", file("document/footercontact".$lang[0]));?></div>
                    </div>
                    <div class="option">
                        <div class="optionTitle"><?php E("about us") ?></div>
                        <ul><li><a href="./aboutUs.php"><?php E("about us") ?></a></li><li><a href="./contactUs.php"><?php E("contact us") ?></a></li><li><a href="./news.php"><?php E("News") ?></a></li><li><a href="./articles.php"><?php E("articles") ?></a></li><li><a href="#"><?php E("location") ?></a></li><li><a href="./cooperation.php"><?php E("Cooperation") ?></a></li><li><a href="./comment.php"><?php E("Comment") ?></a></li></ul>
                    </div>
                </div>
                <div class="copyRight">
                    <p><?php E("copyright") ?></p>
                </div>
            </div>
        </div>
    </body>
</html>